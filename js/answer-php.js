$( ".container > div" ).prepend( '<button id="print">Print</button>' );
$("#print").click(function(){
    var divContents = $(".answers").html();
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>Print...</title>');
    printWindow.document.write('</head><body style="direction:rtl;" >');
    printWindow.document.write(divContents);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
});