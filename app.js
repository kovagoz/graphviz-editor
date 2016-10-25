var vue = new Vue({
    el: '#app',
    methods: {
        compile: function (e) {
            var code = document.getElementById('code').value;

            var req = new XMLHttpRequest();

            req.onload = function () {
                document.getElementById('viewer').innerHTML = this.responseText;
            }

            req.open('POST', 'compiler.php');
            req.send(code);
        }
    }
});
