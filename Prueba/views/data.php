<!-- @autor: Luis Salgado 28/10/2022 -->
<main>
    <!-- Div que contiene el titulo, texto y el boton principal -->
    <div class="px-4 py-5 my-5 text-center mb-4">
        <img class="d-block mx-auto mb-4" src="assets/images/datacrm.png" alt="" width="170" height="65">
        <h1 class="display-5 fw-bold">API (PHP + JQUERY)</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Prueba Tecnica en la cual se obtienen los datos de WebService y se muestran en una tabla.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3" onClick="obtenerDatos()">Obtener Datos</button>
        </div>
    </div>
    <!-- Div que contiene la Tabla con los resultados que vienen del webservice -->
    <div class="col-lg-6 mx-auto  mt-4" id="divResult" style="display:none">
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <td colspan="4">Resultado</td>
                </tr>
                <tr>
                    <td>Id</td>
                    <td>Contact_No</td>
                    <td>LastName</td>
                    <td>CreatedTime</td>
                </tr>
            </thead>
            <tbody name="resultado" id="resultado">
            </tbody>
        </table>
      </div>
    </div>
    <!-- Spinner de carga -->
    <div class="col-lg-6 mx-auto mt-4" id="divSpinner" style="display:none">
        <div class="spinner-border" role="status"></div>
        <span class="sr-only">Cargando...</span>
    </div>
  </div>
</main>


