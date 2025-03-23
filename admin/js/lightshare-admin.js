class LightshareAdmin {
	constructor($) {
		this.$ = $;
		this.init();
	}

	init() {
		this.setupEventHandlers();
		this.initializeTabs();
		this.setupResetSettings();
	}

	setupResetSettings() {
		this.$("#lightshare-reset-settings").on("click", e => {
			e.preventDefault();
			if (
				confirm(
					"Are you sure you want to reset all Lightshare settings? This action cannot be undone."
				)
			) {
				this.$.ajax({
					url: lightshare_admin.ajax_url,
					type: "POST",
					data: {
						action: "lightshare_reset_settings",
						nonce: lightshare_admin.nonce
					},
					success: response => {
						if (response.success) {
							alert(
								"Settings reset successfully. The page will now reload."
							);
							location.reload();
						} else {
							alert("Failed to reset settings. Please try again.");
						}
					},
					error: () => {
						alert("An error occurred. Please try again.");
					}
				});
			}
		});
	}

	// Helper methods
	updateQueryStringParameter(uri, key, value) {
		let re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
		let separator = uri.indexOf("?") !== -1 ? "&" : "?";
		return uri.match(re)
			? uri.replace(re, "$1" + key + "=" + value + "$2")
			: uri + separator + key + "=" + value;
	}

	// Event handlers
	setupEventHandlers() {
		this.setupTabSwitching();
		this.setupFormSubmission();
	}

	setupTabSwitching() {
		this.$(".nav-tab-wrapper a").on("click", e => {
			e.preventDefault();
			const target = this.$(e.currentTarget).attr("href").substr(1);
			this.setActiveTab(target);
			history.pushState(
				null,
				null,
				this.updateQueryStringParameter(window.location.href, "tab", target)
			);
		});
	}

	setupFormSubmission() {
		this.$("form").on("submit", e => {
			e.preventDefault();
			const form = this.$(e.currentTarget);
			let formData = form.serializeArray();

			form.find("input[type=checkbox]:not(:checked)").each(function () {
				formData.push({ name: this.name, value: "0" });
			});

			formData = jQuery.param(formData);
			formData += "&action=lightshare_save_settings";
			formData += "&lightshare_nonce=" + lightshare_admin.nonce;

			this.showLoadingIndicator();

			jQuery.ajax({
				url: lightshare_admin.ajax_url,
				type: "POST",
				data: formData,
				success: response => {
					this.hideLoadingIndicator();
					if (response.success) {
						this.showNotice(response.data, "success");
					} else {
						const errorMessage =
							response.data ||
							"Failed to save settings. Please try again.";
						this.showNotice(errorMessage, "error");
					}
				},
				error: () => {
					this.hideLoadingIndicator();
					this.showNotice("An error occurred. Please try again.", "error");
				}
			});
		});
	}

	showNotice(message, type) {
		this.$(".lightshare-inline-notice").remove();
		const noticeClass =
			type === "success" ? "notice-success" : "notice-error";
		const notice = this.$(
			`<span class="lightshare-inline-notice ${noticeClass}">${message}</span>`
		);
		this.$("#submit").after(notice);
		setTimeout(() => {
			notice.fadeOut(300, function () {
				jQuery(this).remove();
			});
		}, 3000);
	}

	showLoadingIndicator() {
		this.$("#submit").val("Saving...");
	}

	hideLoadingIndicator() {
		this.$("#submit").val("Save Changes");
	}

	// Initialization methods
	initializeTabs() {
		const urlParams = new URLSearchParams(window.location.search);
		const activeTab = urlParams.get("tab") || "general";
		this.setActiveTab(activeTab);
	}

	setActiveTab(tab) {
		this.$(".nav-tab-wrapper a").removeClass("nav-tab-active");
		this.$(`.nav-tab-wrapper a[href="#${tab}"]`).addClass("nav-tab-active");
		this.$(".tab-content > div").hide();
		this.$(`#${tab}`).show();
		this.$("#lightshare_active_tab").val(tab);
	}
}

// Initialize the admin functionality
jQuery(function ($) {
	const lightshareAdmin = new LightshareAdmin($);
	window.setActiveTab = tab => lightshareAdmin.setActiveTab(tab);

	const urlParams = new URLSearchParams(window.location.search);
	const activeTab = urlParams.get("tab") || "general";
	setActiveTab(activeTab);

	setTimeout(() => {
		const submitButton = document.getElementById("submit-button");
		if (submitButton) submitButton.style.display = "block";
	}, 50);

	setTimeout(() => {
		const notice = $(".notice-success");
		if (notice) notice.slideToggle();
	}, 1500);
});
