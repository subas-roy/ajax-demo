console.log('Admin');
document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('ajax-demo-btn');
    if (button) {
        button.addEventListener('click', async function (event) {
            console.log('Button Clicked');

            const formData = new FormData();
            formData.append('action', 'demo');

            const response = await fetch(ajdm.ajax_url, {
                method: 'POST',
                body: formData,
            });

            const jsonData = await response.json();
            console.log(jsonData);
        });
    }
});
