let profile = document.getElementById('profile_image')

profile.addEventListener('change', () => {
	const file = event.target.files[0];
	const image = document.getElementById('imagePreview');
	const uploadText = document.querySelector('.UploadText');
    const uploadLabel = document.getElementById('uploadLabel');

	if (file) {
		const reader = new FileReader();

		reader.onload = (e) => {
			image.src = e.target.result;
			image.style.display = 'block';
			uploadText.style.display = 'none';
            uploadLabel.style.display = 'none';
		};

		reader.readAsDataURL(file);
	} else {
		image.src = '#';
		image.style.display = 'none';
		uploadText.style.display = 'block';
        uploadLabel.style.display = 'block';
	}
});

$(document).ready( () => {
	if ($("#imagePreview").attr("src") === "#") {
		$("#imagePreview").css("display", "none");
        $("#uploadLabel").css("display", "block");
		$(".UploadText").html("<i class=\"fa-solid fa-user fuchsia\" style=\"font-size:150px\"></i>");
	}
});