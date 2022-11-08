<?php


namespace App\Http\Services;


use App\Http\Repositories\DocumentProjectRepository;

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
        if (!empty($request->file) && $request->file != 'undefined') {
            $data['link'] = $this->uploadService->upload($request);
        }
        $this->documentProjectRepository->update($request->id, $data);
        return;

    }
}
