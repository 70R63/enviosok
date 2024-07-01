<style>
    .pdf {
        width: 100%;
        aspect-ratio: 4 / 3;
    }

</style>


<object class="pdf" 
    type="application/pdf"
            data="{{ url('storage/csf/')}}/{!! $csf['ruta_csf_pdf'] !!}"
           >
    
    <p>Por favor cargue su Constancia de Situacion Fiscal o verifique con su administrador.</p>
</object>

