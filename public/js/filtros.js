window.onload = function() {
    iniciar();
};

let selectCagegoria;
function iniciar(){
    var selectCagegoria = document.getElementById('select-cagergory');
    selectCagegoria.addEventListener('change', onChangeFilter);
}

function onChangeFilter() {
    const categoryId = document.getElementById("select-cagergory").value;
    location.href = './panel?category_id=' + categoryId;
}