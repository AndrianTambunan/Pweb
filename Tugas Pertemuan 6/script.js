document.getElementById('form').addEventListener('submit', function(event) {
    const mahasiswa = document.getElementById('mahasiswa')
    const nim = document.getElementById('nim')
    const dosen = document.getElementById('dosen')
    const matkul = document.getElementsByName('matkul')[0] // Mengambil elemen select dengan name 'matkul'

    
    const inputMhs = mahasiswa.value.trim()
    const inputNim = nim.value.trim()
    const inputDosen = dosen.value.trim()
    const selectedMatkul = matkul.value // Mengambil nilai yang dipilih dalam dropdown 'matkul'


    if (inputMhs === '') {
        alert('Silahkan isi kolom Nama Mahasiswa')
    }
    if (inputNim === '') {
        alert('Silahkan isi kolom NRP')
    }
    if (selectedMatkul === '0') {
        alert('Silahkan memilih Mata Kuliah');
        event.preventDefault(); // Mencegah pengiriman formulir jika mata kuliah belum dipilih
    }
    if (inputDosen === '') {
        alert('Silahkan isi kolom Nama Dosen')
    }
    if (inputDosen !== '' && inputNim !== '' && inputMhs !== '' && selectedMatkul !== '0') {
        return window.open('popup.html')
    }
})

