// Preview Image
function previewImage(event) {
    var input = event.target;
    var preview = input.nextElementSibling.querySelector(".preFoto");

    var reader = new FileReader();
    reader.onload = function () {
        preview.style.backgroundImage = "url(" + reader.result + ")";
    };
    reader.readAsDataURL(input.files[0]);
}

// Adjust Height TextArea
function adjustTextareaHeight(textarea) {
    textarea.style.height = "auto";
    textarea.style.height = textarea.scrollHeight + "px";
}

// Form Keahlian
$(document).ready(function () {
    $("#inputKeahlian").on("keypress", function (e) {
        if (e.which == 13) {
            e.preventDefault();
            let skillName = $(this).val();
            if (skillName) {
                let skillItem = `
                    <div class="skill-item">
                        <input type="text" name="skills[]" value="${skillName}" class="namaKeahlian"
                        readonly>
                        <div class="barRange">
                            <input type="range" name="levels[]" min="0" max="100" value="0"
                            class="valueKeahlian">
                            <span class="valueRange">0%</span>
                            <span class="remove-skill"><i class="bi bi-x-circle"></i></span>
                        </div>
                    </div>
                `;
                $("#outputKeahlian").append(skillItem);
                $(this).val("");
            }
        }
    });

    $(document).on("click", ".remove-skill", function () {
        $(this).closest(".skill-item").remove();
    });

    $(document).on("input", ".valueKeahlian", function () {
        let currentValue = $(this).val();
        let $rangeSpan = $(this).next(".valueRange");
        $rangeSpan.text(currentValue + "%");

        let progress = (currentValue / 100);
        $(this).css({
            "background": `linear-gradient(to right, #03662B ${progress * 100}%, #EFEFEF ${progress * 100}%)`
        });
    });
});

// Pendidikan
$(document).ready(function () {
    $("#tambahPendidikan").on("click", function (e) {
        e.preventDefault();
        let jurusan = $("#jurusan").val();
        let sekolah = $("#sekolah").val();
        let tahunEdu = $("#tahun-edu").val();
        let infoEdu = $("#info-edu").val();

        let infoRelevan = infoEdu === "" ? "" : infoEdu;

        if (jurusan && sekolah && tahunEdu || infoEdu) {
            let pendidikanItem = `
                <div class="pendidikan-item">
                    <div class="text-pendidikan">
                        <input type="text" name="nama-prodi[]" value="${jurusan}" class="jurusan" readonly>
                        <input type="text" name="nama-lembaga[]" value="${sekolah}" class="nama-lembaga" readonly>
                        <input type="text" name="tahun[]" value="${tahunEdu}" class="tahun" readonly>
                        <input type="text" name="info-relevan[]" value="${infoRelevan}" class="info-relevan" readonly>
                    </div>
                    <div class="aksi-pendidikan">
                        <span class="edit-pendidikan"><i class="bi bi-pencil-square"></i></span>
                        <span class="remove-pendidikan"><i class="bi bi-x-circle"></i></span>
                    </div>
                </div>
            `;
            $("#ouputPendidikan").append(pendidikanItem);
            $("#jurusan").val("");
            $("#sekolah").val("");
            $("#tahun-edu").val("");
            $("#info-edu").val("");
        }
    });

    $(document).on("click", ".remove-pendidikan", function () {
        $(this).closest(".pendidikan-item").remove();
    });

    $(document).on("click", ".edit-pendidikan", function () {
        let pendidikanItem = $(this).closest(".pendidikan-item");
        let jurusanInput = pendidikanItem.find("input[name='nama-prodi[]']");
        let sekolahInput = pendidikanItem.find("input[name='nama-lembaga[]']");
        let tahunEduInput = pendidikanItem.find("input[name='tahun[]']");
        let infoEduInput = pendidikanItem.find("input[name='info-relevan[]']");

        jurusanInput.prop("readonly", false);
        sekolahInput.prop("readonly", false);
        tahunEduInput.prop("readonly", false);
        infoEduInput.prop("readonly", false);

        $(this).html("<i class='bi bi-save'></i>");
        $(this).addClass("save-pendidikan");
        $(this).removeClass("edit-pendidikan");
    });

    $(document).on("click", ".save-pendidikan", function () {
        let pendidikanItem = $(this).closest(".pendidikan-item");
        let jurusanInput = pendidikanItem.find("input[name='nama-prodi[]']");
        let sekolahInput = pendidikanItem.find("input[name='nama-lembaga[]']");
        let tahunEduInput = pendidikanItem.find("input[name='tahun[]']");
        let infoEduInput = pendidikanItem.find("input[name='info-relevan[]']");

        jurusanInput.prop("readonly", true);
        sekolahInput.prop("readonly", true);
        tahunEduInput.prop("readonly", true);
        infoEduInput.prop("readonly", true);

        $(this).html("<i class='bi bi-pencil-square'></i>");
        $(this).addClass("edit-pendidikan");
        $(this).removeClass("save-pendidikan");
    });
});

// Pengalaman  
$(document).ready(function () {
    $("#tambahPengalaman").on("click", function (e) {
        e.preventDefault();
        let posisi = $("#posisi").val();
        let instansi = $("#instansi").val();
        let tahunEx = $("#tahun-ex").val();
        let infoEx = $("#info-ex").val();

        let infoRelevan = infoEx === "" ? "" : infoEx;

        if (posisi && instansi && tahunEx || infoEx) {
            let pengalamanItem = `
                <div class="pengalaman-item">
                    <div class="text-pengalaman">
                        <input type="text" name="posisi-pekerjaan[]" value="${posisi}" class="jurusan" readonly>
                        <input type="text" name="nama-perusahaan[]" value="${instansi}" class="nama-lembaga" readonly>
                        <input type="text" name="tahunEx[]" value="${tahunEx}" class="tahun" readonly>
                        <input type="text" name="info-relevanEx[]" value="${infoRelevan}" class="info-relevan" readonly>
                    </div>
                    <div class="aksi-pengalaman">
                        <span class="edit-pengalaman"><i class="bi bi-pencil-square"></i></span>
                        <span class="remove-pengalaman"><i class="bi bi-x-circle"></i></span>
                    </div>
                </div>
            `;
            $("#outputPengalaman").append(pengalamanItem);
            $("#posisi").val("");
            $("#instansi").val("");
            $("#tahun-ex").val("");
            $("#info-ex").val("");
        }
    });

    $(document).on("click", ".remove-pengalaman", function () {
        $(this).closest(".pengalaman-item").remove();
    });

    $(document).on("click", ".edit-pengalaman", function () {
        let pengalamanItem = $(this).closest(".pengalaman-item");
        let jabatan = pengalamanItem.find("input[name='posisi-pekerjaan[]']");
        let perusahaan = pengalamanItem.find("input[name='nama-perusahaan[]']");
        let tahun = pengalamanItem.find("input[name='tahunEx[]']");
        let infoRelevan = pengalamanItem.find("input[name='info-relevanEx[]']");

        jabatan.prop("readonly", false);
        perusahaan.prop("readonly", false);
        tahun.prop("readonly", false);
        infoRelevan.prop("readonly", false);

        $(this).html("<i class='bi bi-save'></i>");
        $(this).addClass("save-pengalaman");
        $(this).removeClass("edit-pengalaman");
    });

    $(document).on("click", ".save-pengalaman", function () {
        let pengalamanItem = $(this).closest(".pendidikan-item");
        let jabatan = pengalamanItem.find("input[name='posisi-pekerjaan[]']");
        let perusahaan = pengalamanItem.find("input[name='nama-perusahaan[]']");
        let tahun = pengalamanItem.find("input[name='tahunEx[]']");
        let infoRelevan = pengalamanItem.find("input[name='info-relevanEx[]']");

        jabatan.prop("readonly", true);
        perusahaan.prop("readonly", true);
        tahun.prop("readonly", true);
        infoRelevan.prop("readonly", true);

        $(this).html("<i class='bi bi-pencil-square'></i>");
        $(this).addClass("edit-pengalaman");
        $(this).removeClass("save-pengalaman");
    });
});