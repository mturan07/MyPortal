
const elBirimFiyat = document.getElementById('birimfiyat');
const elNetAgirlik = document.getElementById('netagirlik');
const elTutar = document.getElementById('tutar');
const btnKaydet = document.getElementById('btnKaydet');

let birimfiyat = 0;
let netagirlik = 0;
let tutar = 0;

elBirimFiyat.addEventListener('change', TutarHesapla);
elBirimFiyat.addEventListener('input', TutarHesapla);

elNetAgirlik.addEventListener('change', TutarHesapla);
elNetAgirlik.addEventListener('input', TutarHesapla);

function TutarHesapla(){
    birimfiyat = elBirimFiyat.value;
    //console.log(birimfiyat);

    if (birimfiyat > 0)
    {
        netagirlik = elNetAgirlik.value;
        //console.log(netagirlik);

        tutar = netagirlik > 0 ? birimfiyat * netagirlik : 0; 
        //console.log(tutar);

        elTutar.value = tutar;
    }
};

function secilenDeger(nesne) {
    const selectUrun = document.getElementById(nesne);
    const sonuc = selectUrun.options[selectUrun.selectedIndex].value;
    return sonuc;
}

btnKaydet.addEventListener('click', function(event){
    event.preventDefault();
    //alert('Tıkladın!');
    //const selectUrun = document.getElementById('urun_id');
    //const secilen = selectUrun.options[selectUrun.selectedIndex].value;
    const secilenUrun = secilenDeger('urun_id');
    //console.log(secilen);
    if (secilenUrun == '')
    {
        document.getElementById('urun_id').focus();
        //alert('Lütfen ürün seçiniz!');
        $.alert({
            title: 'Uyarı',
            content: 'Lütfen ürün seçiniz!',
        });
    }
    else
    {
        const secilenBirim = secilenDeger('birim_id');
        if (secilenBirim == '')
        {
            document.getElementById('birim_id').focus();
            //alert('Lütfen birim seçiniz!');
            $.alert({
                title: 'Uyarı',
                content: 'Lütfen birim seçiniz!',
            });
        }
        else
            document.getElementById('formKayit').submit();
            // {
            //     const secilenOnay = secilenDeger('onayli');
            //     if (secilenOnay == '') {
            //         document.getElementById('onayli').focus();
            //         //alert('Lütfen onay durumunu seçiniz!');
            //         $.alert({
            //             title: 'Uyarı',
            //             content: 'Lütfen onay durumunu seçiniz!',
            //         });
            //     }
            //     else
            //         document.getElementById('formKayit').submit();
            // }
    }
});