class Archivo {
    constructor(contenedorId) {
        this.contenedor = document.getElementById(contenedorId);
        this.codigo = this.contenedor.dataset.codigo;
        this.tipo = this.contenedor.dataset.tipo;
        this.total = parseInt(this.contenedor.dataset.total);
        this.inputTotal = this.contenedor.querySelector(`#input-total-${this.codigo}`);
        this.maxmb = this.contenedor.dataset.maxmb;
        this.required = this.contenedor.dataset.required;
        this.multiple = this.contenedor.dataset.multiple;
        this.archivoCarga = this.contenedor.querySelector(`input[type="file"]`);
        this.informacionArchivo = this.contenedor.querySelector(`.informacion-archivo`);
        this.enlaceArchivo = this.contenedor.querySelector(`.enlace-archivo`);
        this.seleccionArchivo = this.contenedor.querySelector(`.seleccion-archivo`);
        this.barraProgreso = this.contenedor.querySelector(`.barra-progreso-archivo`);
        this.mensajeCarga = this.contenedor.querySelector(`.mensaje-carga-archivo`);
        this.mensajeError = this.contenedor.querySelector(`.mensaje-error-archivo`);
        this.btnCarga = this.contenedor.querySelector(`.btn-carga-archivo`);
        this.enlaceDescarga = this.contenedor.querySelector(`.enlace-descargar-archivo`);
        this.btnEliminarArchivo = this.contenedor.querySelector(`.btn-eliminar-archivo`);
        this.btnPreviewArchivo = this.contenedor.querySelector(`.btn-preview-archivo`);
        this.btnsPreview = this.contenedor.querySelectorAll(`.btn-preview`);
        this.btnsEliminar = this.contenedor.querySelectorAll(`.btn-eliminar`);
        this.archivoId = this.contenedor.querySelector(`input[name="${this.codigo}_id"]`);
        this.archivoIds = this.contenedor.querySelector(`input[name="${this.codigo}_ids"]`);
        this.entidad_type = this.contenedor.querySelector(`input[name="${this.codigo}_entidad_type"]`).value;
        this.entidad_id = this.contenedor.querySelector(`input[name="${this.codigo}_entidad_id"]`).value;
        this.archivoIds = this.contenedor.querySelector(`input[name="${this.codigo}_ids"]`);
        this.base_url = base_url;

        this.descripcionInput = this.multiple ? this.contenedor.querySelector(`#descripcion-archivo-${this.codigo}`) : null;
        this.tablaArchivos = this.multiple ? this.contenedor.querySelector('.table tbody') : null;

        this.initEventos();
    }

    initEventos() {
        this.archivoCarga.addEventListener('change', (e) => this.cargarArchivo(e));
        if(this.btnEliminarArchivo)
            this.btnEliminarArchivo.addEventListener('click', (e) => this.eliminarArchivo(this.btnEliminarArchivo));
        this.btnPreviewArchivo.addEventListener('click', (e) => this.previewArchivo(this.btnPreviewArchivo));

        if (this.multiple) {
            this.btnsPreview.forEach((el)=> {
                el.addEventListener('click', (e) => this.previewArchivo(el));
            });
            this.btnsEliminar.forEach((el)=> {
                el.addEventListener('click', (e) => this.eliminarArchivo(el));
            });
        }
    }

    cargarArchivo(e) {
        const file = this.archivoCarga.files[0];
        if (!file) return;

        if (this.multiple && !this.descripcionInput.value.trim()) {
            this.descripcionInput.classList.add('is-invalid');
            this.descripcionInput.focus();
            this.archivoCarga.value = '';
            return;
        }
        if(this.multiple)
            this.descripcionInput.classList.remove('is-invalid');

        let validTypes = [];
        let msgType;

        if(this.tipo==="imagen"){
            validTypes = ['image.*'];
            msgType = "Tipo de archivo no permitido. Sólo se permiten imágenes."
        }else if(this.tipo==="pdf-imagen"){
            validTypes = ['application/pdf', 'image.*'];
            msgType = "Tipo de archivo no permitido. Sólo se permiten documentos PDF e imágenes."
        }else if(this.tipo==="documento"){
            validTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            msgType = "Tipo de archivo no permitido. Sólo se permiten documentos PDF y documentos de Word."
        }else if(this.tipo==="video"){
            validTypes = ['video/mp4'];
            msgType = "Tipo de archivo no permitido. Sólo se permiten videos."
        }else{
            validTypes = ['image.*', 'application/pdf', 'video/mp4', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            msgType = "Tipo de archivo no permitido. Solo se permiten imágenes, videos .mp4, PDF y documentos de Word.";
        }

        if (!validTypes.some(type => file.type.match(type))) {
            this.errorCargaArchivo(msgType);
            this.archivoCarga.value = '';
            return;
        }

        if (file.size > parseInt(this.maxmb) * 1024 * 1024) {
            this.errorCargaArchivo(`El tamaño del archivo debe ser menor o igual a ${this.maxmb}MB.`);
            this.archivoCarga.value = '';
            return;
        }


        const formData = new FormData();
        formData.append('file', file);
        const token = document.head.querySelector('meta[name="csrf-token"]').content;
        formData.append('_token', token);
        formData.append('codigo', this.codigo);
        formData.append('maxmb', this.maxmb);
        formData.append('entidad_type', this.entidad_type);
        formData.append('entidad_id', this.entidad_id);
        if (this.multiple) {
            formData.append('descripcion', this.descripcionInput.value.trim());
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', `${this.base_url}/cargar-archivo`, true);

        xhr.upload.onprogress = (e) => {
            this.btnCarga.classList.add('disabled');
            if (e.lengthComputable) {
                const percentage = (e.loaded / e.total) * 100;
                this.barraProgreso.style.display = 'flex';
                this.barraProgreso.querySelector('.progress-bar').style.width = `${percentage}%`;
                this.barraProgreso.querySelector('.progress-bar').textContent = `${percentage.toFixed(0)}%`;
            }
        };

        xhr.onload = () => {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.response);
                this.mostrarInformacionArchivo(response);
            } else {
                this.errorCargaArchivo('Error al subir el archivo. Intente nuevamente.');
            }
        };

        xhr.onerror = () => {
            this.errorCargaArchivo('Error en la red o servidor no disponible.');
        };

        xhr.send(formData);
    }

    mostrarInformacionArchivo(response) {
        if (this.multiple) {
            const nuevaFila = `
                <tr>
                    <td class="">
                        <p class="p-0 m-0 fw-semibold">
                            ${response.nombre}
                        </p>
                        <p class="p-0 m-0">
                            ${response.descripcion} ${response.peso}
                        </p>
                    </td>
                    <td>
                        <a data-bs-toggle="tooltip" title="Descargar"
                        href="${response.ruta}/descarga" class="btn btn-sm btn-link float-end enlace-descargar-archivo py-0 text-primary">
                            <i class="fa fa-download"></i>
                        </a>
                        <button type="button" data-bs-toggle="tooltip" class="btn btn-sm btn-link float-end btn-eliminar py-0"
                                title="Eliminar" data-archivo-id="${response.id}" id="btn-eliminar-${response.id}">
                            <i class="fa fa-trash text-danger"></i>
                        </button>
                        <button type="button"
                                data-bs-toggle="tooltip"
                                class="btn btn-sm btn-link float-end btn-preview py-0"
                                title="Vista previa"
                                data-tipo="${this.tipo}"
                                data-url="${response.ruta}"
                                data-extension="${response.extension}"
                                id="btn-preview-${response.id}"
                        >
                            <i class="fa fa-eye text-gray"></i>
                        </button>
                    </td>
                </tr>
            `;

            if (this.total>0)
                this.tablaArchivos.insertAdjacentHTML('beforeend', nuevaFila);
            else
                this.tablaArchivos.innerHTML=nuevaFila;

            this.total = this.total+1;
            this.inputTotal.value = this.total;

            let btnPreview = document.getElementById(`btn-preview-${response.id}`);
            btnPreview.addEventListener('click',()=>{this.previewArchivo(btnPreview)});
            let btnEliminar = document.getElementById(`btn-eliminar-${response.id}`);
            btnEliminar.addEventListener('click',()=>{this.eliminarArchivo(btnEliminar)});
            if(this.multiple)
                this.descripcionInput.value = '';
            let ids = this.archivoIds.value ? JSON.parse(this.archivoIds.value) : [];
            ids.push(response.id);
            this.archivoIds.value = JSON.stringify(ids);
            this.reset();
        }
        else{
            this.informacionArchivo.style.display = 'flex';
            this.btnCarga.style.display = 'none';
            this.seleccionArchivo.style.display = 'none';
            this.enlaceDescarga.href = response.ruta+'/descarga';
            this.enlaceArchivo.href = response.ruta;
            this.enlaceArchivo.textContent = response.nombre;
            this.btnEliminarArchivo.dataset.archivoId = response.id;
            this.btnPreviewArchivo.dataset.extension = response.extension;
            this.btnPreviewArchivo.dataset.url = response.ruta;
            if(this.archivoId)this.archivoId.value=response.id;
        }
        this.barraProgreso.style.display = 'none';
        this.mensajeCarga.innerHTML = '<div class="alert alert-success text-start f-12 py-1"><i class="fa fa-check-circle"></i> Archivo cargado correctamente.</div>';
        this.mensajeCarga.style.display = 'block';
        setTimeout(() => this.mensajeCarga.style.display = 'none', 3000);
    }
    reset() {
        this.informacionArchivo.style.display = 'none';
        this.btnCarga.style.display = 'block';
        this.btnCarga.classList.remove('disabled');
        this.seleccionArchivo.style.display = 'block';
        this.barraProgreso.style.display = 'none';
        this.mensajeCarga.style.display = 'none';
        this.mensajeError.style.display = 'none';
        this.archivoCarga.value = '';
        if (this.required)
            this.archivoCarga.setAttribute('required',true);
        this.enlaceDescarga.href = '';
        this.enlaceArchivo.href = '';
        this.enlaceArchivo.textContent = '';
        this.btnEliminarArchivo.dataset.archivoId = '';
        this.btnPreviewArchivo.dataset.url = '';
        this.btnPreviewArchivo.dataset.extension = '';
    }


    eliminarArchivo(el) {
        let archivoId = el.dataset.archivoId;
        if (!archivoId) return;

        axios.post(`${this.base_url}/eliminar-archivo`, {
            _token: document.head.querySelector('meta[name="csrf-token"]').content,
            archivo_id: archivoId
        }).then(r =>{
            this.reset();
            if(r.data){
                if (this.multiple) {
                    const filaParaEliminar = el.closest('tr');
                    let archivoIdStr = String(archivoId);
                    let ids = this.archivoIds.value ? JSON.parse(this.archivoIds.value) : [];
                    ids = ids.map(String).filter(id => id !== archivoIdStr);
                    this.archivoIds.value = JSON.stringify(ids);
                    this.total = this.total - 1;
                    this.inputTotal.value = this.total;
                    setTimeout(() => filaParaEliminar.remove(), 300);
                    if(!this.total)
                        this.tablaArchivos.innerHTML=
                        `<tr>
                            <td class="py-3">Sin archivos agregados</td>
                        </tr>`;
                }
                this.mensajeCarga.style.display = 'block';
                this.mensajeCarga.innerHTML = `<div class="alert alert-success text-start f-12 py-1"><i class="fa fa-check-circle"></i> ${r.data.msg}</div>`;
                setTimeout(() => this.mensajeCarga.style.display = 'none', 3000);
            }
        }).catch(e => {
            this.errorCargaArchivo(e);
        });
    }
    previewArchivo(el){
        let data = el.dataset;
        if(data.extension && data.url){
            var myModal = new bootstrap.Modal(document.getElementById('modal-preview-archivo'));
            if(data.tipo==='imagen'||data.tipo==='pdf-imagen'){
                if(data.extension==='pdf'||data.extension==='PDF')
                    document.getElementById('div-preview-archivo').innerHTML=`
                        <embed src="${data.url}"  alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" class="w-100" style="height: 600px">`;
                else
                    document.getElementById('div-preview-archivo').innerHTML=`<img src="${data.url}" class="img-thumbnail" style="max-height: 400px">`;
            }
            else if(data.tipo==='video')
                document.getElementById('div-preview-archivo').innerHTML=`<video class="w-100" controls>
                                <source src="${data.url}" type="video/mp4">
                                Tu navegador no soporta vídeos HTML5.
                            </video>`;
            else if(data.tipo==='documento'){
                if(data.extension==='pdf')
                    document.getElementById('div-preview-archivo').innerHTML=`
                        <embed src="${data.url}"  alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html" class="w-100" style="height: 600px">`;
                else
                    document.getElementById('div-preview-archivo').innerHTML=`
                        <a href="${data.url}/descarga"  class="btn btn-primary">Descargar archivo</a>`;

            }
            document.getElementById('enlace-preview-archivo').value = data.url;
            if(data.tipo!=="")
                myModal.show();
        }
    }

    errorCargaArchivo(message) {
        this.btnCarga.classList.remove('disabled');
        this.barraProgreso.style.display = 'none';
        this.mensajeError.style.display = 'block';
        this.mensajeError.innerHTML = `<div class="alert alert-danger text-start f-12 py-1"><i class="fa fa-warning"></i> ${message}</div>`;
        setTimeout(() => this.mensajeError.style.display = 'none', 3000);
    }
}
document.addEventListener('DOMContentLoaded', function () {
    const archivos = document.querySelectorAll('.archivo');
    console.log(archivos)
    archivos.forEach(function (el) {
        new Archivo(el.id);
    });
    if(document.getElementById('btn-copiar-enlace-archivo')){
        document.getElementById('btn-copiar-enlace-archivo').addEventListener('click',function(){
            var copy = document.getElementById("enlace-preview-archivo");
            copy.select();
            copy.setSelectionRange(0, 99999);
            document.execCommand("copy");
            document.getElementById("btn-copiar-enlace-archivo").innerHTML = "¡Enlace copiado!";
            setTimeout(() => document.getElementById("btn-copiar-enlace-archivo").innerHTML = `<i class="fa fa-lg fa-copy text-primary"></i>`, 2200);
        })
    }
});
