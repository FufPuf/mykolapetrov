require([], function () {
    document.querySelector('#generate').addEventListener('click', (e) => {
        e.preventDefault();
        let r = Math.random().toString(36).substring(2);
        document.querySelector('#unique_link').value = "http://mykolapetrov.test/promotion/" + r;
        document.querySelector('#generate').style.cssText = "display: none;";
        document.querySelector('#copy').style.cssText = "display: block;";
    })
})