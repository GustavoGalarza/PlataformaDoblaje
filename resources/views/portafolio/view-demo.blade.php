<!-- Modal View Demo -->
<div class="modal fade" id="viewDemoModal" tabindex="-1" aria-labelledby="viewDemoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDemoTitle">Demo</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Columna izquierda: Reproductor y título -->
                    <div class="col-md-6 mb-3">
                        <h5 id="viewDemoTitulo" class="mb-3">Título Demo</h5>
                        <div id="viewDemoArchivoWrapper">
                            <!-- Aquí se insertará video o audio -->
                        </div>
                    </div>

                    <!-- Columna derecha: Datos de la demo -->
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush text-white" id="viewDemoDatos">
                            <!-- Los datos se insertarán aquí con JS -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
