@extends("employee.layout.master")
@section('page_name', '- Tạo mới dự án')
@section("content")
    <div class="column column-right d-flex flex-wrap flex-fill">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <p class="title mb-3"><?= __('message.project_basics') ?></p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tên dự án</label>
                        <input type="text" class="form-control" id="project_name">
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái dự án</label>
                        <select class="form-control" id="status">
                            <option value="1">Đang mở bán</option>
                            <option value="2">Dự án đã hoàn thành</option>
                            <option value="3">Dự án đang pending</option>
                            <option value="4">Đóng đầu tư</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Loại bất động sản</label>
                        <input type="text" class="form-control" id="type_of_real_estate">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ dự án</label>
                        <input type="text" class="form-control" id="project_address">
                    </div>
                    <div class="form-group">
                        <label for="">Tổng số phần</label>
                        <input type="number" class="form-control" id="total_number_of_parts">
                    </div>
                    <div class="form-group">
                        <label for="">Lợi nhuận dự kiến</label>
                        <input type="number" class="form-control" id="expected_profit">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả dự án</label>
                        <textarea name="editor1" class="form-control " id="describe_project"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Giá bán (vnđ)</label>
                        <input type="number" class="form-control" id="price">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="item-image">
                <p class="title-image toggle">
                    Ảnh đại diện
                    <span class="control">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                </p>
                <label for="single-image-1" class="btn-image content">
                    <input type="file" id="single-image-1" class="d-none"
                           onchange="document.getElementById('single-src-image-1').src = window.URL.createObjectURL(this.files[0])">
                    <img name="image_avatar" src="https://via.placeholder.com/335x235" class="img-fluid" alt=""
                         id="single-src-image-1">
                    <a href="" title="" class="action delete">
                        Xóa ảnh
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                </label>

            </div>
            <br>

            <div class="ls-item-image">
                <label class="title-image toggle">
                    Ảnh slide
                    <span class="control">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </span>
                </label>
                <div class="ls content">
                    <label class="image" for="image-1" template>
                        <input type="file" name="img[]" id="image-1" class="d-none" accept="image/*"
                               onchange="document.getElementById('src-image-1').src = window.URL.createObjectURL(this.files[0])">
                        <img name="image_gallery" src="https://via.placeholder.com/385x172" class="img-fluid" alt=""
                             id="src-image-1">
                    </label>
                    <!--random mã ID-->
                    <label class="plus-image" data-id="1019292" data-number="1">
                        <span class="text">Thêm ảnh</span>
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <p class="title mb-3"><?= __('message.project_overview') ?></p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Mô tả tổng quan dự án</label>
                        <textarea class="form-control " id="project_overview"></textarea>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Địa điểm dự án</label>
                        <textarea class="form-control " id="project_site_overview"></textarea>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Thị Trường</label>
                        <textarea class="form-control " id="market_overview"></textarea>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tổng quan nền tảng</label>
                        <textarea class="form-control " id="platform_overview"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <p class="title mb-3"><?= __('message.asset') ?></p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><?= __('message.year_built') ?></label>
                        <input type="number" class="form-control" id="year_built">
                    </div>
                    <div class="form-group">
                        <label for=""><?= __('message.total_building_area') ?></label>
                        <input type="number" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">NRSF</label>
                        <input type="number" class="form-control" id="nrsf">
                    </div>
                    <div class="form-group">
                        <label for=""><?= __('message.expected_capacity') ?></label>
                        <input type="number" class="form-control" id="expected_capacity">
                    </div>
                    <div class="form-group">
                        <label for=""><?= __('message.target_stable_return_on_cost') ?></label>
                        <input type="number" class="form-control" id="target_stable_return_on_cost">
                    </div>
                    <div class="form-group">
                        <label for=""><?= __('message.cost_so_far') ?></label>
                        <input type="number" class="form-control" id="cost_so_far">
                    </div>
                    <div class="form-group">
                        <label for=""><?= __('message.project_highlights') ?></label>
                        <textarea class="form-control " id="project_highlights"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả vị trí dự án</label>
                        <textarea class="form-control " id="project_location_description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <p class="title mb-3"><?= __('message.investor') ?></p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><?= __('message.investor_introduction') ?></label>
                        <textarea type="text" class="form-control" id="introducing_investor"></textarea>
                    </div>
                    <div class="form-group">
                        <label for=""><?= __('message.company_name') ?></label>
                        <input type="text" class="form-control" id="company_name">
                    </div>
                    <div class="form-group">
                        <label for=""><?= __('message.company_address') ?></label>
                        <input type="text" class="form-control" id="company_address">
                    </div>
                    <div class="form-group">
                        <label for=""><?= __('message.company_description') ?></label>
                        <textarea type="text" class="form-control" id="company_description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <p class="title mb-3"><?= __('message.business_plan') ?></p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><?= __('message.description_of_the_business_plan') ?></label>
                        <textarea type="text" class="form-control" id="description_business_plan"></textarea>
                    </div>
                </div>
                <div class="ls">
                    <div class="elementor_json_field">
                        <div class="hidden-item" style="display:none;">
                            <div class="item col-100">
                                <div class="elementor_json_field_control col-100">
                                    <div class="elementor_json_field_control_name">
                                        <label>Tiêu đề</label>
                                    </div>
                                    <div class="elementor_json_field_control_content col">
                                        <input type="text" data-name="title_plan" data-type="text"
                                               class="control text title form-control" value="">
                                    </div>
                                </div>
                                <div class="elementor_json_field_control col-100">
                                    <div class="elementor_json_field_control_name">
                                        <label>Nội dung</label>
                                    </div>
                                    <div class="elementor_json_field_control_content col">
                                        <textarea type="text" data-name="content_plan" data-type="text"
                                                  class="control text content form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <span class="close">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div class="list-items list-items-json_fieldcontents rounded">
                            <div class="item col-100">
                                <div class="elementor_json_field_control col-100">
                                    <div class="elementor_json_field_control_name">
                                        <label>Tiêu đề</label>
                                    </div>
                                    <div class="elementor_json_field_control_content col">
                                        <input type="text" data-name="title_plan" data-type="text"
                                               class="control text title form-control" value="">
                                    </div>
                                </div>
                                <div class="elementor_json_field_control col-100">
                                    <div class="elementor_json_field_control_name">
                                        <label>Nội dung</label>
                                    </div>
                                    <div class="elementor_json_field_control_content col">
                                        <textarea type="text" data-name="content_plan" data-type="text"
                                                  class="control text content form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <span class="close">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-center" style="width: 80%; text-align: left !important;">
                            <div class="btnadmin">
                                <button type="button" class="btn btn-success add-json_fieldcontents action">
                                    Thêm mới
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer" style="background-color: white">
        <button type="button" class="btn btn-success" id="create_project">Tạo mới</button>
    </div>
    <script>
        $(document).ready(function () {
            $('#create_project').click(function () {
                let project_name = $('#project_name').val();
                let status = $('#status').val();
                let type_of_real_estate = $('#type_of_real_estate').val();
                let project_address = $('#project_address').val();
                let total_number_of_parts = $('#total_number_of_parts').val();
                let expected_profit = $('#expected_profit').val();
                let describe_project = CKEDITOR.instances.describe_project.getData();
                let price = $('#price').val();
                let project_overview = CKEDITOR.instances.project_overview.getData();
                let project_site_overview = CKEDITOR.instances.project_site_overview.getData();
                let market_overview = CKEDITOR.instances.market_overview.getData();
                let platform_overview = CKEDITOR.instances.platform_overview.getData();
                let image_avatar = $('#image_avatar').attr('src');
                let year_built = $('#year_built').val();
                let total_building_area = $('#total_building_area').val();
                let nrsf = $('#nrsf').val();
                let expected_capacity = $('#expected_capacity').val();
                let target_stable_return_on_cost = $('#target_stable_return_on_cost').val();
                let cost_so_far = $('#cost_so_far').val();
                let project_highlights = CKEDITOR.instances.project_highlights.getData();
                let project_location_description = CKEDITOR.instances.project_location_description.getData();

                let introducing_investor = CKEDITOR.instances.introducing_investor.getData();
                let company_description = CKEDITOR.instances.company_description.getData();
                let company_name = $('#company_name').val()
                let company_address = $('#company_address').val()

                let count_image_gallery = $("img[name='image_gallery']").length;
                let image_gallery = [];
                if (count_image_gallery > 0) {
                    $("img[name='image_gallery']").each(function () {
                        image_gallery.push($(this).attr('src'))
                    });
                }

                //
                let count_title_plan = $("input[data-name='title_plan']").length;
                let count_content_plan = $("input[data-name='title_plan']").length;
                let data_plan = {};
                let count = 0
                // if (count_title_plan > 0) {
                //     $("input[data-name='title_plan']").each(function () {
                //         let test = {};
                //         test['title_plan'] = $(this).val();
                //         data[count] = test
                //         count++
                //     });
                // }
                // count = 0
                // if (count_content_plan > 0) {
                //     $("textarea[data-name='content_plan']").each(function () {
                //         data[count]['content_plan'] = $(this).val()
                //         count++
                //     });
                // }


                $.ajax({
                    url: window.origin + '/admin/create_project',
                    type: "POST",
                    data: {
                        project_name: project_name,
                        status: status,
                        type_of_real_estate: type_of_real_estate,
                        project_address: project_address,
                        total_number_of_parts: total_number_of_parts,
                        expected_profit: expected_profit,
                        describe_project: describe_project,
                        price: price,
                        image_gallery: image_gallery,
                        project_overview: project_overview,
                        project_site_overview: project_site_overview,
                        market_overview: market_overview,
                        platform_overview: platform_overview,
                        image_avatar: image_avatar,

                        year_built: year_built,
                        total_building_area: total_building_area,
                        nrsf: nrsf,
                        expected_capacity: expected_capacity,
                        target_stable_return_on_cost: target_stable_return_on_cost,
                        cost_so_far: cost_so_far,
                        project_highlights: project_highlights,
                        project_location_description: project_location_description,

                        introducing_investor: introducing_investor,
                        company_name: company_name,
                        company_description: company_description,
                        company_address: company_address,

                        data_plan: data_plan
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (result) {
                        console.log(result)
                    },
                    error: function (result) {
                        console.log(result);

                    }
                });
            });
        })

    </script>
    <script src="{{asset('frontend/js/project.js')}}"></script>
@endsection
