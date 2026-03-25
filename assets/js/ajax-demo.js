console.log('Admin');
document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('ajax-demo-btn');
    if (button) {
        button.addEventListener('click', async function (event) {
            // console.log('Button Clicked');

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

    const currencyButton = document.getElementById('ajax-demo-currency-btn');
    if (currencyButton) {
        currencyButton.addEventListener('click', async function (event) {
            // console.log('Button Clicked');
            document.getElementById('ajax-demo-currency-result').innerHTML =
                'Fetching current rates...';
            const formData = new FormData();
            formData.append('action', 'currency');

            const response = await fetch(ajdm.ajax_url, {
                method: 'POST',
                body: formData,
            });

            const jsonData = await response.json();
            console.log(jsonData);
            if (jsonData.success) {
                let html = '<ul>';
                for (currency in jsonData.data) {
                    html += `<li>BDT to ${currency} = ${jsonData.data[currency]}</li>`;
                }
                html += '</ul>';
                document.getElementById('ajax-demo-currency-result').innerHTML =
                    html;
            }
        });
    }
});

// Journey -> send request to wordpress, fetch data, get data
