;
console.log(window)
var el = document.querySelector("th.sortfield");
console.log(el);

(function () {
    Drupal.behaviors.exampleModule = {
        attach: function (context, settings) {
            var elements = document.querySelectorAll(".sortfield");
            function resertArrows(elements) {
                elements.forEach(function(element) {
                    element.classList.remove('asc');
                    element.classList.remove('desc');
                });
            }
            elements.forEach(function(element) {
                console.log(element);
                element.addEventListener('click', function (e) {

                    var sortFieldTHead = e.target;
                    var sortingTable = sortFieldTHead.parentElement.parentElement.parentElement;
                    var cellIndex = getElementIndex(e.target);

                    function getElementIndex(dElement) {
                        var index = 0;
                        while ( (dElement = dElement.previousElementSibling) ) {
                            index++;
                        }
                        return index;
                    }
                    function sortTable(sortingTable,cellIndex,asc){
                        var tbl = sortingTable;
                        var rowsArr = [],
                            rowLen = tbl.rows.length;
                        for (var i = 1; i < rowLen; i++) {
                            var sortnr = tbl.rows[i].cells[cellIndex].textContent || tbl.rows[i].cells[cellIndex].innerText;
                            rowsArr.push([sortnr, tbl.rows[i]]);
                        }
                        if (asc) {
                            rowsArr.sort(function(x,y){
                                return x[0].localeCompare(y[0]);
                            });
                        }else{
                            rowsArr.sort(function(x,y){
                                return y[0].localeCompare(x[0]);
                            });
                        }
                        console.log(rowsArr);
                        for(var i = 0; i<rowsArr.length; i++){
                            tbl.appendChild(rowsArr[i][1]);
                        }
                        rowsArr = null;
                    }

                    if (e.target.classList.contains('asc')) {
                        resertArrows(elements);
                        e.target.classList.remove('asc');
                        e.target.classList.add('desc');
                        sortTable(sortingTable, cellIndex, false);
                    }else if (e.target.classList.contains('desc')) {
                        resertArrows(elements);
                        e.target.classList.remove('desc');
                        e.target.classList.add('asc');
                        sortTable(sortingTable, cellIndex, true);
                    }else{
                        resertArrows(elements);
                        e.target.classList.add('asc');
                        sortTable(sortingTable, cellIndex, true);
                    }
                })
            });
        }
    };
}());