document.addEventListener('DOMContentLoaded', function() {
    var btnSalvarPDF = document.getElementById('btnSalvarPDF');
    if (btnSalvarPDF) {
        btnSalvarPDF.addEventListener('click', function() {
            const body = document.body;
            body.classList.add('exportando-pdf');
            const card = document.querySelector('.result-card');
            const container = document.querySelector('.container');
            // Esconde botões temporariamente
            const botoes = card.querySelectorAll('.btn, .btn-link');
            botoes.forEach(btn => btn.style.display = 'none');
            // Remove sombra e força fundo branco
            card.style.background = '#fff';
            card.classList.remove('shadow');
            container.style.background = '#fff';
            html2canvas(card, {backgroundColor: '#fff'}).then(function(canvas) {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new window.jspdf.jsPDF({ orientation: 'portrait', unit: 'pt', format: 'a4' });
                const pageWidth = pdf.internal.pageSize.getWidth();
                // Ajusta a imagem para caber na largura da página
                const imgWidth = pageWidth - 40;
                const imgHeight = canvas.height * imgWidth / canvas.width;
                pdf.addImage(imgData, 'PNG', 20, 20, imgWidth, imgHeight);
                pdf.save('resultado-quiz-' + (new Date()).toISOString().slice(0,10).replace(/-/g,'') + '.pdf');
                // Restaura botões, sombra e fundo
                botoes.forEach(btn => btn.style.display = '');
                card.style.background = '';
                card.classList.add('shadow');
                container.style.background = '';
                body.classList.remove('exportando-pdf');
            });
        });
    }
});
