<?php


namespace Modules\Mysql\Models;


class Project extends BaseModel
{
    protected $table = 'project';

    //Status
    const ON_SALE = 1; //Đang mở bán
    const FINISHED = 2; //Dự án đã hoàn thành
    const PENDING = 3; //Dự án đang pending
    const CLOSE_INVESTMENT = 4; //Đóng đầu tư

    const STATUS = 'status'; //Trạng thái dự án
    const IMAGE_AVATAR = 'image_avatar'; //Ảnh đại diện sản phẩm
    const TYPE_OF_REAL_ESTATE = 'type_of_real_estate'; //Loại bất động sản
    const PROJECT_NAME = 'project_name'; //Tên dự án
    const PROJECT_ADDRESS = 'project_address'; //Địa chỉ dự án
    const TOTAL_NUMBER_OF_PARTS = 'total_number_of_parts'; // Tổng số phần
    const EXPECTED_PROFIT = 'expected_profit'; //Lợi nhuận dự kiến
    const DESCRIBE_PROJECT = 'describe_project'; //Mô tả dự án
    const PRICE = 'price'; //Giá bán

    //Tổng quan dự án
    const PROJECT_OVERVIEW = 'project_overview'; //Tổng quan dự án
    const PROJECT_SITE_OVERVIEW = 'project_site_overview'; //Tổng quan địa điểm dự án
    const MARKET_OVERVIEW = 'market_overview'; //Thị trường
    const PLATFORM_OVERVIEW = 'platform_overview'; //Tổng quan nền tảng

    //Tài sản
    const YEAR_BUILT = 'year_built'; //Năm xây dựng
    const TOTAL_BUILDING_AREA = 'total_building_area'; //Tổng diện tích xây dựng
    const NRSF = 'nrsf';
    const EXPECTED_CAPACITY = 'expected_capacity'; //Công suất dự kiến ​​(bao gồm hợp đồng thuê MTM)
    const TARGET_STABLE_RETURN_ON_COST = 'target_stable_return_on_cost'; //Mục tiêu Lợi tức ổn định trên Chi phí
    const COST_SO_FAR = 'cost_so_far'; //Giá ($ 6,5mm) + Chi phí cho đến nay
    const PROJECT_HIGHLIGHTS = 'project_highlights'; //Điểm nổi bật của dự án

    //Chủ đầu tư
    const INVESTOR = 'investor'; //Chủ đầu tư
    const INTRODUCING_INVESTOR = 'introducing_investor'; //Giới thiệu chủ đầu tư
    const COMPANY_NAME = 'company_name'; //Tên công ty
    const COMPANY_ADDRESS = 'company_address'; //Địa chỉ công ty
    const COMPANY_DESCRIPTION = 'company_description'; //Mô tả công ty

    //Kế hoạch kinh doanh
    const DESCRIPTION_BUSINESS_PLAN = 'description_business_plan'; // Mô tả kế hoạch kinh doanh

    //Các tài liệu khác
    const DESCRIPTION_OTHER_DOCUMENTS = 'description_other_documents'; //Các tài liệu khác
}
