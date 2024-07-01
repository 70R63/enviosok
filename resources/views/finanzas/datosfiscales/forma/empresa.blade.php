<div class="row">


    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Raz&oacute;n Social
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::text('razon_social'
            , $csf['razon_social']
            ,['class'       => 'form-control'
                ,'required' =>  'true'
            ])
        !!}
    </div>

    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">RFC
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::text('rfc'
            , $csf['rfc']
            ,['class'       => 'form-control'
                ,'required' =>  'true'
            ])
        !!}
    </div>

    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Corre Electronico
                <span class="tx-danger">*</span>
            </span>
        </div>

         {!! Form::text('email'
            , $csf['email']
            ,['class'       => 'form-control'
                ,'required' =>  'true'
                ,'id'       => 'true'
            ])
        !!}
    </div>

    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Calle
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::text('calle'
            , $csf['calle']
            ,['class'       => 'form-control'
                ,'required' =>  'true'
            ])
        !!}
    </div>

    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">No. Exterior
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::text('no_exterior'
            , $csf['no_exterior']
            ,['class'       => 'form-control'
                ,'required' =>  'true'
            ])
        !!}
   
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">No. Interior
            </span>
        </div>

        {!! Form::text('no_interior'
            , $csf['no_interior']
            ,['class'       => 'form-control'
                
            ])
        !!}
    </div>
    
    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">C.P.
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::text('cp'
            , $csf['cp']
            ,['class'       => 'form-control'
                ,'id'       => 'cp'
                ,'required' =>  'true'
            ])
        !!}
    </div>
    
    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Colonia
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::select('colonia'
              , array()
              ,null
             ,['class'       => 'form-control select2'
                 ,'placeholder'  => 'Seleccionar'
                 ,'id'       => 'colonia'
                      
            ]);
        !!}
    </div>
    
    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Municipio
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::text('municipio'
            , ''
            ,['class'       => 'form-control'
            ,'id'           => 'municipio'
                ,'required' =>  'true'
                ,'readonly' => 'true'
            ])
        !!}
    </div>
    
    <div class="input-group mb-3 col-md-12 ">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Estado
                <span class="tx-danger">*</span>
            </span>
        </div>

        {!! Form::text('estado'
            , ''
            ,['class'       => 'form-control'
                ,'id'       => 'estado'
                ,'required' =>  'true'
                ,'readonly' => 'true'
            ])
        !!}
    </div>

</div>

{!! Form::hidden('colonia_oculto'
    , $csf['colonia']
    ,['class'       => 'form-control'
        ,'id'       => 'colonia_oculto'
        
    ])
!!}