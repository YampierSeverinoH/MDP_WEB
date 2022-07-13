<?PHP
include("../menu.php");

?>

<!--  este apartado es el contenido del programa -->
<div class="col-9">
    <div class=" ContForm">
        <form action="#" method="POST" enctype="multipart/form-data">
            <center>
                <h1 class="h4">CONTROL COVID 19</h1>
            </center>
            <div class="container">
                <div class="row justify-content-start">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pregunta</th>
                                <th scope="col">SI</th>
                                <th scope="col">NO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Sensación de alza termina, fiebre o malestar</td>

                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p01" id="p01y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p01" id="p01n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Dolor de garganta, tos estornudos o dificultad para respirar</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p02" id="p02y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p02" id="p02n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Dolor de cabeza o diarrea o congestión nasal</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p03" id="p03y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p03" id="p03n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Contacto con un caso confirmado de COVID-19</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p04" id="p04y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p04" id="p04n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Está tomado alguna medicación</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p05" id="p05y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p05" id="p05n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Perdida del gusto y/o del olfato </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p06" id="p06y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p06" id="p06n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Pertenece a algún grupo de riesgo para COVID-19</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p07" id="p07y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p07" id="p07n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>No tener historial de viajes o residencia en zonas definidas de riesgo (China, Italia, Irán, Corea del Sur, Francia, Alemania, España, EE.UU., Brasil y cualquier otro país que considere relevante para efectos de contagios del COVID-19) en los últimos 14 días</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p08" id="p08y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p08" id="p08n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>No haber tenido contacto cercano con un caso probable o confirmado de infección por coronavirus de los últimos 145 días anteriores al ingreso a la Municipalidad distrital de Pucalá</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p09" id="p09y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p09" id="p09n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>No haber asistido en los últimos 14 días a lugares con afluencia masiva de personas extranjeras, estableciendo contacto directo y cercano especial con personas provenientes de lugares con casos confinados de coronavirus COVID-19; sobre todo respecto a los países mencionado en el presente documento</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p010" id="p010y">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p010" id="p010n" checked>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">11</th>
                                <td>11. He tomado conocimiento de todos los procedimientos t protocolos implementados por la MUNICIPALIDAD DISTRITAL DE PUCALÁ para prevenir y controlar el contagio de COVID-19, e incluso declaró conocer que eh sido informado.</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p011" id="p011y" checked>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="p011" id="p011n">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- BOTON DE ENVIO -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col col-2">
                        <!-- agregar funcionalidad js -->
                        <input name="" id="" class="btn btn-primary" type="button" value="Guardar" onclick="RespuestaCovid()">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
</div>
</div>
</div>
</body>

</html>