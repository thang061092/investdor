<div class="modal modal-blur fade" id="confirm-bill" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật giao dịch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control text-danger" id="bill_id" name="bill_id">
                <div class="mb-3">
                    <label class="form-label"><strong>Khách hàng</strong><span class="text-danger">*</span></label>
                    <input type="text" class="form-control text-danger" id="name_investor" disabled
                           name="name_investor">
                </div>
                <div class="mb-3">
                    <label class="form-label"><strong>Dự án</strong><span class="text-danger">*</span></label>
                    <input type="text" class="form-control name_project text-danger" placeholder="Nhập mã phụ lục"
                           name="name_project" disabled>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Ngày tạo giao dịch</strong><span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control created_at" name="created_at" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Số tiền thanh toán</strong><span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control amount_money text-danger"
                                   name="amount_money" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Nội dung chuyển khoản</strong><span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control order_code text-danger"
                                   name="order_code" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Trạng thái</strong><span
                                    class="text-danger">*</span></label>
                            <select type="text" class="form-control status_bill text-danger"
                                    name="status">
                                <option value="">Chọn trạng thái</option>
                                @foreach(status_bill() as $s => $b)
                                    <option value="{{$s}}">{{$b}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="payment" style="display: none">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label"><strong>Ngày thanh toán</strong><span
                                        class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control payment_date" name="payment_date">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label"><strong>Ghi chú</strong><span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control note" name="note"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="img-ct-license" class="img-ct">
                                    <input type="file" name="ct-license" accept="image/*" class="d-none"
                                           id="img-ct-license"
                                           onchange="document.getElementById('img-license').src = window.URL.createObjectURL(this.files[0])"/>
                                    <img id="img-license" src="{{asset('frontend/images/default.png')}}"
                                         class="img-fluid" alt="" width="300px" height="300px"/>
                                </label>
                                <label class="form-label"><strong>Upload chứng từ</strong><span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn_confirm_transaction">Cập nhật
                </button>
            </div>
        </div>
    </div>
</div>
