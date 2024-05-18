async function searchPlant() {
    const plantName = document.getElementById('plantName').value;
    const apiUrl = `http://localhost:3000/api/plants/search?token=C649dnNMTGWIQgLa82A-4X26ELQvD7KDbHRjY6Odl8E&q=${plantName}`;

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
                <img src="${plant.image_url}" alt="${plant.common_name}">
                <p><strong>Bilimsel Adı:</strong> ${plant.scientific_name}</p>
                <p><strong>Aile:</strong> ${plant.family_common_name}</p>
            `;
        } else {
            document.getElementById('plantDetails').innerHTML = '<p>Bitki bulunamadı.</p>';
        }
    } catch (error) {
        console.error('Fetch hatası:', error);
        document.getElementById('plantDetails').innerHTML = `<p>Bir hata oluştu: ${error.message}</p>`;
    }
}
