@extends('layouts.app')

@section('content')
    <a href="/">Home</a><br>
    <label> Añadir Producto
        <a href="https://www.amazon.com/-/es/Xbox-Elite-Wireless-Controller-Core-Controladores/dp/B0B789CGGQ?ref_=Oct_d_omg_d_20972798011_3&pd_rd_w=Qr5cS&content-id=amzn1.sym.77ae9c9a-9dda-41a8-ab9c-d9d0c450d72b&pf_rd_p=77ae9c9a-9dda-41a8-ab9c-d9d0c450d72b&pf_rd_r=28FPE74EFNXEMDFKF7CW&pd_rd_wg=81CcS&pd_rd_r=a3cf36c2-07af-42b3-be4d-543bf55765be&pd_rd_i=B0B789CGGQ">Xbox</a>
    <a href="https://www.amazon.com/deportivos-cordones-transpirables-informales-atl%C3%A9ticos/dp/B0B49L4WXS/ref=sxin_16_pa_sp_search_thematic_sspa?c=ts&content-id=amzn1.sym.9efcc700-d635-445c-9d53-884ea58d759c%3Aamzn1.sym.9efcc700-d635-445c-9d53-884ea58d759c&cv_ct_cx=mens%2Bfashion%2Bsneakers&keywords=Tenis%2Bde%2BModa%2Bpara%2BHombre&pd_rd_i=B0B49MR6ND&pd_rd_r=14c502e7-447e-490c-8571-cae735c14559&pd_rd_w=q1VbJ&pd_rd_wg=uYYLz&pf_rd_p=9efcc700-d635-445c-9d53-884ea58d759c&pf_rd_r=FXM65BQBYVG308D098FN&qid=1685552894&s=apparel&sbo=RZvfv%2F%2FHxDF%2BO5021pAnSA%3D%3D&sr=1-3-2b34d040-5c83-4b7f-ba01-15975dfb8828-spons&ts_id=679312011&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUEySkJSOE1BUllIMFVRJmVuY3J5cHRlZElkPUEwODc3MTc5MU5NTTZYRU9QQ1U2TSZlbmNyeXB0ZWRBZElkPUEwMzE4MzY2MjlHQlFYU0ZQWjY3NiZ3aWRnZXROYW1lPXNwX3NlYXJjaF90aGVtYXRpYyZhY3Rpb249Y2xpY2tSZWRpcmVjdCZkb05vdExvZ0NsaWNrPXRydWU&th=1&psc=1">Shoes</a>
    <a href="https://www.amazon.com/-/es/NS-50F301NA24/dp/B0BTTVRWPR?ref_=Oct_d_onr_d_172659_0&pd_rd_w=T7YnE&content-id=amzn1.sym.4fed9226-5c93-4eb3-a4f6-42a3e28a27b9&pf_rd_p=4fed9226-5c93-4eb3-a4f6-42a3e28a27b9&pf_rd_r=Q2VFKXEG1P5GN339FZDP&pd_rd_wg=mm2YM&pd_rd_r=6e87d56e-add5-4d41-8938-f50fb91036e5&pd_rd_i=B0BTTVRWPR">TV</a>
        <div class="box" style="width:80%; margin:0%;">
            <form class="input-large" method='POST' action='/product-add' accept-charset='UTF-8'  enctype="multipart/form-data" autocomplete='off'>
                @csrf
                <input onkeyup="countLetters();" id="addproduct_name" class="input-large" type="text" placeholder="name" name="name" maxlength="150"><br>
                <div id="name_text_limit">0/150</div>
                <textarea onkeyup="countLetters();" id="addproduct_description"  cols="145" rows="12" maxlength="1500" ></textarea>
                <input type="text" name="description" maxlength="1500" hidden>
                <div id="description_text_limit">0/1500</div>
                <br>
                <input class="input-large" type="text" placeholder="category" name="category"><br>
                <input type="text" placeholder="units" name="units"><br>
                <input type="text" placeholder="price" name="price" onkeyup="$('#local_price').val('Q.'+this.value*8)"><input id="local_price" type="text" placeholder="precio en Quetzales" disabled>
                <br>
                <input type="text" placeholder="discount" name="discount" >
                <div style="width:100px; height:20px; border:1px solid black;" >
                    <label for="files" style="display:block; width:100px; height:100px;">
                        Añadir Imagen
                    </label>
                    <input id="files" name="images[]" multiple onchange="image(this);" type="file" hidden/>
                </div>

                <div id="images" style="display:flex; width:100px; height:100px; border:1px solid black;" >
                </div>
                <input type="submit" value="Añadir Producto">
            </form>
        </div>
    </label>
@endsection

