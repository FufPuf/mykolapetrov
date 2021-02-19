require([], function () {
    document.querySelector('#copy').addEventListener('click', (e) => {
        e.preventDefault();
        let copyText = document.getElementById('unique_link');
        copyText.select();
        document.execCommand('copy');
    })
})