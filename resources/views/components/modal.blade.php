<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="container">
                        <!-- ID -->
                        <div class="row">
                            <div class="col-md-4" id="viewable">
                                <div class="mb-3">
                                    <label for="id"><strong>ID:</strong></label>
                                    <input type="text" class="form-control" name="id" id="id">
                                </div>
                                <div class="mb-3">
                                    <label for="instance_name"><strong>Name:</strong></label>
                                    <input type="text" class="form-control" name="instance_name" id="instance_name">
                                </div>
                                <div class="mb-3">
                                    <label for="instance_host"><strong>Host:</strong></label>
                                    <input type="text" class="form-control" name="instance_host" id="instance_host">
                                </div>
                                <div class="mb-3">
                                    <label for="ymp_name"><strong>YMP:</strong></label>
                                    <input type="text" class="form-control" name="ymp_name" id="ymp_name">
                                </div>
                                <div class="mb-3">
                                    <label for="full_url"><strong>URL:</strong></label>
                                    <input type="text" class="form-control" name="full_url" id="full_url">
                                </div>
                            </div>

                            <div class="editable col-md-4">
                                <div class="mb-3">
                                    <label for="caco_customer_id"><strong>Customer ID:</strong></label>
                                    <input type="text" class="form-control" name="caco_customer_id" id="caco_customer_id">
                                    <p class="text-danger mt-2" id="caco_customer_id_error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="caco_customer_name"><strong>Customer Name:</strong></label>
                                    <input type="text" class="form-control" name="caco_customer_name" id="caco_customer_name">
                                    <p class="text-danger mt-2" id="caco_customer_name_error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="caco_group_name"><strong>Group Name:</strong></label>
                                    <input type="text" class="form-control" name="caco_group_name" id="caco_group_name">
                                    <p class="text-danger mt-2" id="caco_group_name_error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="caco_group_id"><strong>Group ID:</strong></label>
                                    <input type="text" class="form-control" name="caco_group_id" id="caco_group_id">
                                    <p class="text-danger mt-2" id="caco_group_id_error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="pbx_status"><strong>PBX:</strong></label>
                                    <select class="form-select" id="pbx_status">
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="TEST/DEMO">TEST/DEMO</option>
                                        <option value="RETIRED">RETIRED</option>
                                    </select>
                                    <p class="text-danger mt-2" id="pbx_status_error"></p>
                                </div>
                            </div>

                            <div class="editable col-md-4">
                                <div class="mb-3">
                                    <label for="sync_status"><strong>Sync:</strong></label>
                                    <select  class="form-select" id="sync_status">
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="READONLY">READONLY</option>
                                        <option value="ERROR">ERROR</option>
                                        <option value="NONE">NONE</option>
                                    </select>
                                    <p class="text-danger mt-2" id="sync_status_error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="extensions_in_use"><strong>In Use:</strong></label>
                                    <input type="text" class="form-control" name="extensions_in_use" id="extensions_in_use">
                                    <p class="text-danger mt-2" id="extensions_in_use_error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="sync_extensions_matched"><strong>Matched:</strong></label>
                                    <input type="text" class="form-control" name="sync_extensions_matched" id="sync_extensions_matched">
                                    <p class="text-danger mt-2" id="sync_extensions_matched_error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="extensions_licenced"><strong>Licence:</strong></label>
                                    <input type="text" class="form-control" name="extensions_licenced" id="extensions_licenced">
                                    <p class="text-danger mt-2" id="extensions_licenced_error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="extensions_provisioned"><strong>Provisioned:</strong></label>
                                    <input type="text" class="form-control" name="extensions_provisioned" id="extensions_provisioned">
                                    <p class="text-danger mt-2" id="extensions_provisioned_error"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button type="button" class="btn btn-primary" id="saveButton" onclick="patchHostPbx()">Save</button>
            </div>
        </div>
    </div>
</div>
