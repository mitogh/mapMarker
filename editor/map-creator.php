<?php include_once 'header.php'; ?>
    <body id="link">
    <div class="container">
        <div class="row">

            <div class="col-xs-3">
                <form role="form">
                    <div class="form-group">
                        <label for="location">Location </label>
                        <input id="location" name="location" type="text" class="form-control" placeholder="Enter a city">
                    </div>


                    <div class="form-group">
                        <label for="width">Width </label>
                        <div class="input-group">
                            <input id="width" name="width" type="number" class="form-control" placeholder="500" min="1" max="5000">
                            <span class="input-group-addon">px</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="height">Height </label>
                        <div class="input-group">
                            <input id="height" name="height" type="number" class="form-control" placeholder="400" min="1" max="5000">
                            <span class="input-group-addon">px</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type">Terrain: </label>
                        <select class="form-control terrain-control">
                            <option value="roadmap">Road Map</option>
                            <option value="satellite">Satellite</option>
                            <option value="hybrid">Hybrid</option>
                            <option value="terrain">Terrain</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Alignment: </label>
                        <select class="form-control align-control">
                            <option value="left">Left</option>
                            <option value="center">Center</option>
                            <option value="right">Right</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Actions: </label>
                        <button type="button" class="btn btn-danger btn-block btn-remove-markers">Remove markers!</button>
                        <button type="submit" class="btn btn-success btn-block btn-save">Save & Done!</button>
                    </div>
                </form>
            </div>

          <div id="map" class="col-xs-9">
          </div>

        </div>
    </div>
<?php include_once 'footer.php'; ?>
