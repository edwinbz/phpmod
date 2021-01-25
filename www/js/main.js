const _rootPro = "";
const _rootDev = "phpmod/";
const _domainPro = 'www.phpmod.com';
const _root = (window.location.hostname == _domainPro) ? _rootPro : _rootDev;
const _host = location.protocol + '//' + window.location.hostname + '/' + _root;
const _comm = _host + "commutator.php";

const overlay = '<div id="overlay" class="h-100 justify-content-center align-items-center"><div class="loader"></div></div>';

$(document).ready(function () {
    $('body').append(overlay);
});

function _overlayOn() {
    document.getElementById("overlay").style.display = "flex";
    $('body').css('overflow-x', 'hidden');
    $('body').css('overflow-y', 'hidden');
}

function _overlayOff() {
    document.getElementById("overlay").style.display = "none";
    $('body').css('overflow-x', 'auto');
    $('body').css('overflow-y', 'auto');
}

function _ajax(call, tmpData = {}, loader = false, sendFile = false) {
    const data = new FormData();
    const keys = Object.keys(tmpData);
    const values = Object.values(tmpData);
    //
    for (let i = 0; i < keys.length; i++) {
        if (keys[i] == 'listas') {
            data.append(keys[i], JSON.stringify(values[i]));
        } else {
            data.append(keys[i], values[i]);
        }
    }
    data.append('path', call);
    // data.path = call;
    return $.post({
        type: "POST",
        url: _comm,
        data: data,
        processData: sendFile,
        contentType: sendFile,
        enctype: 'multipart/form-data',
        beforeSend: function () {
            if (loader) {
                $(document).ready(function () {
                    _overlayOn();
                });
            }
        }
    }).done(function (r) {
        if (!r.success && r.code == 1) alert('APP ERROR: ' + r.msg);
        if (!r.success && r.code == 2) alert('PDO ERROR: ' + r.msg);
        // if (!r.success && r.code == 3) alert(r.msg);
    }).fail(function (xhr, status, error) {
        _overlayOff();
        if (xhr.readyState == 4) {
            alert('Error "' + e.responseText + '"');
        } else if (xhr.readyState == 0) {
            alert("Error de red, por favor verifique su conexión a internet e intente nuevamente.\nDetalles: "
                + JSON.stringify(xhr) + '@' + status + '@' + error);
        } else {
            alert("Error desconocido\nDetalles: " + JSON.stringify(xhr) + '@' + status + '@' + error)
        }
    }).always(() => {
        if (loader) {
            _overlayOff();
        }
    });
}

function _formatNumber(number, decimals = true) {
    var n = new Intl.NumberFormat('es-CO', { style: "currency", currency: "COP" }).format(number);
    return decimals ? n : n.replace(/\D00$/, '');
}

function _showApp() {
    setTimeout(() => {
        document.getElementById('app').style.display = 'block';
    }, 250);
}

function _formatBytes(sizeInBytes) {
    return (sizeInBytes / (1024 * 1024)).toFixed(2);
}

function _blobToFile(theBlob, fileName) {
    theBlob.lastModifiedDate = new Date();
    theBlob.name = fileName;
    return theBlob;
}

function _cutText(string, maxLegth = 0) {
    var text = string.substring(0, maxLegth)
    if (string.length > maxLegth) {
        text += '...';
    }
    return text;
}

async function _getImgSize(url) {
    return new Promise((resolve, reject) => {
        var image = new Image()
        image.src = url
        image.onload = () => resolve(image)
        image.onerror = () => reject(new Error('could not load image'))
    });
}

function _closeModal(id) {
    $('#' + id).modal("hide");
}