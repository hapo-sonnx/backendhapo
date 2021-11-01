<div class="container-fluid document-container">
    <div class="row">
        <div class="col-lg-12 title-documents">
            <p>Documents</p>
        </div>
        @foreach ($documents as $item)
            <div class="col-lg-12">
                <hr>
                <div class="row">
                    <div class="col-lg-1 pr-0 type-file-container align-self-center">
                        <img class="pdf" @if ($item->type == 'pdf')
                        src="{{ asset('image/video.png') }}" alt="pdf"
                    @elseif ($item->type == 'docx')
                        src="{{ asset('image/docx.png') }}" alt="docx"
                    @elseif ($item->type == 'mp4')
                        src="{{ asset('image/pdf.png') }}" alt="doccx"
        @endif>
    </div>
    <div class="col-lg-3 pl-0 name-file-container align-self-center">
        <a href="" class="title">{{ $item->description }}</a>
    </div>
    <div class="col-lg-8 button-preview-container text-right align-self-center">
        <a href="{{ url('view', $item->id) }}" data-id="{{ $item->id }}" class="btnPreview" target="_blank"
            rel="noopener norefer">
            @foreach ($documentsLearned as $dcm)
                @if ($dcm->document_id == $item->id)
                    Learned
                @endif
            @endforeach
        </a>
    </div>
</div>
</div>
@endforeach
</div>
</div>
