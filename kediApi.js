async function getRandomCat() {
    const apiKey = 'live_p7CzJJN1fqbuDREA31Wx9uVk634dxpX6817CgYXqaBvOSBdHuRXjaYBQfe4qYh5p'; // Buraya kendi API anahtarınızı ekleyin
    const apiUrl = `https://api.thecatapi.com/v1/images/search?api_key=${apiKey}`;

    try {
        const response = await fetch(apiUrl);
        if (!response.ok) {
            throw new Error(`HTTP hatası! Durum: ${response.status}`);
        }

        const data = await response.json();

        if (data && data.length > 0) {
            const catImageUrl = data[0].url;
            document.getElementById('catImage').innerHTML = `<img src="${catImageUrl}" alt="Kedi Resmi" style="max-width: 300px;">`;
        } else {
            document.getElementById('catImage').innerHTML = '<p>Resim bulunamadı.</p>';
        }
    } catch (error) {
        console.error('Fetch hatası:', error);
        document.getElementById('catImage').innerHTML = `<p>Bir hata oluştu: ${error.message}</p>`;
    }
}
