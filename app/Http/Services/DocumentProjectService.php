<?php


namespace App\Http\Services;


use App\Http\Repositories\DocumentProjectRepository;
use Illuminate\Support\Facades\Validator;

class DocumentProjectService
{
    protected $documentProjectRepository;
    protected $uploadService;

    public function __construct(DocumentProjectRepository $documentProjectRepository,
                                UploadService $uploadService)
    {
        $this->documentProjectRepository = $documentProjectRepository;
        $this->uploadService = $uploadService;
    }

    public function find($id)
    {
        return $this->documentProjectRepository->find($id);
    }

    public function update_document($request)
    {
        $data = [];
        if (!empty($request->title_vi)) {
            $data['title_vi'] = $request->title_vi;
            $data['slug_vi'] = slugify($request->title_vi);
        }
        if (!empty($request->title_en)) {
            $data['title_en'] = $request->title_en;
            $data['slug_en'] = slugify($request->title_en);
        }
        if (!empty($request->name_file_vi)) {
            $data['name_file_vi'] = $request->name_file_vi;
        }
        if (!empty($request->name_file_en)) {
            $data['name_file_en'] = $request->name_file_en;
        }
        if ($request->hasFile('file')) {
            $data['link'] = $this->uploadService->upload_param($request->file);
            $data['type_file'] = $request->file->getClientOriginalExtension();
        }
        $this->documentProjectRepository->update($request->id, $data);
        return;
    }

    public function validate_update_document($request)
    {
        $validate = Validator::make($request->all(), [
            'title_vi' => 'required',
            'title_en' => 'required',
            'name_file_vi' => 'required',
            'name_file_en' => 'required',
        ], [
            'title_vi.required' => __('validate.title_vi_not_null'),
            'title_en.required' => __('validate.title_en_not_null'),
            'name_file_vi.required' => __('validate.name_file_not_nul'),
            'name_file_en.required' => __('validate.name_file_not_nul'),
        ]);
        return $validate;
    }

    public function check_validate_update_document($request)
    {
        $message = [];
        if (!$request->hasFile('file')) {
            $message[] = __('validate.file_not_null');
        }

        return $message;
    }
}
