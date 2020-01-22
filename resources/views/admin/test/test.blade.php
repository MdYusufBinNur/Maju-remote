<!DOCTYPE html>
<html>
<head>
    <title>Maju Curated test</title>
    <meta name="_token" content="{{csrf_token()}}" />
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    {{-- ...Some more scripts... --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
</head>
<body>
<div class="container">

    <h3 class="jumbotron">Laravel Multiple Images Upload Using Dropzone</h3>
    <form action="{{ route("projects.store_test") }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name/Description fields, irrelevant for this article --}}

        <div class="form-group">
            <input type="text" name="title" class="form-control">
            <label for="document">Documents</label>
            <div class="needsclick dropzone" id="document-dropzone">

            </div>
        </div>
        <div>
            <input class="btn btn-danger" type="submit">
        </div>
    </form>
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('projects.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                let name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                        @if(isset($project) && $project->document)
                let files =
                {!! json_encode($project->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>
</div>
</body>
</html>
