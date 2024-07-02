<div class="row">

    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Persona Fiscal
                <span class="tx-danger">*</span>
            </span>
        </div>
        {!! Form::select('catalogo_persona_fiscal'
                  , $catalogoPersonaFiscal
                  ,null
                 ,['class'       => 'form-control select2'
                     ,'placeholder'  => 'Seleccionar'
                     ,'id'       => 'catalogo_persona_fiscal'
                     ,'required' =>  'true'
                      
            ]);
        !!}
    </div>
    
    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Regimen Fiscal
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::select('regimen_fiscal'
                  , array()
                  ,null
                 ,['class'       => 'form-control select2'
                     ,'placeholder'  => 'Seleccionar'
                     ,'id'       => 'regimen_fiscal'
                     ,'required' =>  'true'
                      
            ]);
        !!}
    </div>

    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Uso de CFDI
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::select('uso_cfdi'
                  , array()
                  ,null
                 ,['class'       => 'form-control select2'
                     ,'placeholder'  => 'Seleccionar'
                     ,'id'       => 'uso_cfdi'
                     ,'required' =>  'true'
                      
            ]);
        !!}
    </div>
    

    <div class="pd-15">
        <label class="main-content-label mb-0">Cargar Archvio PDF</label>
    </div>

    <input accept=".pdf" type="file" class="dropify" data-height="200" id="csf_pdf" name="csf_pdf" required />
</div>