<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') | CV Builder</title>

    {{-- Botstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    {{-- CKEditor --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />

    {{-- Botstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    {{-- Linked CSS --}}
    @php
        $pageTitle = View::yieldContent('title');
    @endphp
    <link rel="stylesheet"
        href="{{ asset('css/style-' . ($pageTitle == 'Input' || $pageTitle == 'Edit' ? 'input' : 'download') . '.css') }}">

</head>

<body>
    {{-- Header --}}
    <header class="header" id="header">
        <div class="header-container">
            <img src="{{ asset('img/logo-ebelanja.jpg') }}" alt="Logo-eBelanja" class="logo" />
            <nav class="navbar">
                <ul>
                    <li class="nav-item  ">
                        <span class="nav-number"><i class="bi bi-1-circle-fill"></i></span>
                        <a href="/" class="nav-text">Lengkapi Informasi</a>
                    </li>
                    <li>
                        <div class="nav-divider"></div>
                    </li>
                    <li class="nav-item {{ $pageTitle == 'Input' ? 'innactive' : '' }}">
                        <span class="nav-number"><i class="bi bi-2-circle-fill"></i></span>
                        <a href="/download" class="nav-text ">Download CV</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    @yield('section')

    {{-- Javascript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- javascript --}}
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- CKEditor -->
    <script type="importmap">
            {
              "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
              }
            }
          </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font,
            CodeBlock,
            Link,
            AutoLink,
            BlockQuote,
            Image,
            ImageInsert,
            List,
            Alignment,
            ImageResizeEditing,
            ImageResizeHandles,
            AutoImage,
        } from "ckeditor5";

        ClassicEditor.create(document.querySelector("#bio"), {
                plugins: [
                    Essentials,
                    Paragraph,
                    Bold,
                    Italic,
                    Font,
                    Link,
                    BlockQuote,
                    AutoLink,
                    CodeBlock,
                    Image,
                    ImageInsert,
                    List,
                    Alignment,
                    ImageResizeEditing,
                    ImageResizeHandles,
                    AutoImage,
                ],
                toolbar: [
                    "bold",
                    "italic",
                    "|",
                    "link",
                    "blockQuote",
                    "insertImage",
                    "codeBlock",
                    "|",
                    "numberedList",
                    "bulletedList",
                    "|",
                    "alignment:left",
                    "alignment:center",
                    "alignment:right",
                ],
            })
            .then((editor) => {
                window.editor = editor;
            })
            .catch((error) => {
                console.error(error);
            });
    </script>
    <script>
        window.onload = function() {
            if (window.location.protocol === "file:") {
                alert(
                    "This sample requires an HTTP server. Please serve this file with a web server."
                );
            }
        };
    </script>
</body>

</html>
