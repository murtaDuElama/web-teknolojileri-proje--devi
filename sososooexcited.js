async function searchPlant() {
    const plantName = document.getElementById('plantName').value;
    const apiKey = 'sk-wD0S6645acef88a5f5516'; // API anahtarınızı buraya ekleyin
    const apiUrl = `https://perenual.com/api/species-list?key=${apiKey}&name=${plantName}`;

    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
            throw new Error(`HTTP hatası! Durum: ${response.status}`);
        }

        const data = await response.json();

        if (data && data.data && data.data.length > 0) {
            const plant = data.data[0];
            document.getElementById('plantDetails').innerHTML = `
                <h2>${plant.common_name}</h2>
                <img src="${plant.default_image?.original_url}" alt="${plant.common_name}">
                <p><strong>Bilimsel Adı:</strong> ${plant.scientific_name}</p>
                <p><strong>Aile:</strong> ${plant.family}</p>
                <p><strong>Su İhtiyacı:</strong> ${plant.watering}</p>
                <p><strong>Güneş Işığı İhtiyacı:</strong> ${plant.sunlight}</p>
            `;
        } else {
            document.getElementById('plantDetails').innerHTML = '<p>Bitki bulunamadı.</p>';
        }
    } catch (error) {
        console.error('Fetch hatası:', error);
        document.getElementById('plantDetails').innerHTML = `<p>Bir hata oluştu: ${error.message}</p>`;
    }
}
