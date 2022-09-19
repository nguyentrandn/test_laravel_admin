<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
            <div><h3>Danh sach thanh vien</h3></div><hr/>
            <div class="control">
            <form method="get" action="" onSubmit="return false">
                    <div class="d-flex">
                        <label for="search">Tim Kiem TK:</label>
                        <input type="text" id="search" class="form-control w-25 ms-2">
                        <button class="btn">Search</button>
                    </div>
            
                <div class="d-flex mt-3">
                    <p>Tinh trang TK:</p>
                    <div>
                        <input type="checkbox" name="0" id="0">
                        <label for="0">Toan bo</label>
                        <input type="checkbox" name="1" id="1">
                        <label for="1">Cho Xac thuc</label>
                        <input type="checkbox" name="2" id="2">
                        <label for="2">Phe duyet</label>
                        <input type="checkbox" name="3" id="3">
                        <label for="3">Ngung hoat dong</label>
                        <input type="checkbox" name="4" id="4">
                        <label for="4">Rut khoi doi</label>
                    </div>
                </div>
                <div class="d-flex">
                    <p>Gioi tinh:</p>
                    <div>
                        <input type="checkbox" name="0" id="0">
                        <label for="0">Toan bo</label>
                        <input type="checkbox" name="1" id="1">
                        <label for="1">Nam</label>
                        <input type="checkbox" name="2" id="2">
                        <label for="2">Nu</label>
                        <input type="checkbox" name="3" id="3">
                        <label for="3">Khong lua chon</label>
                    </div>
                </div>
            </div>
        </form>
        {{-- button --}}
        <div class="mb-3">
            <button type="button" class="btn btn-primary">Thay doi trang thai</button>
            <button type="button" class="btn btn-danger">Xoa</button>
        </div>
        {{-- table --}}
        <table id="tb" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Liên Hệ</th>
                <th scope="col">Giới Tính</th>
                <th scope="col">Loại Gia Nhập</th>
                <th scope="col">Ngày Gia Nhập</th>
                <th scope="col">Tình Trạng Thành Viên</th>
              </tr>
            </thead>
            <tbody id="tbody">
              
              
            </tbody>
          </table>
    </div>
    <script>
        $(document).ready(function(){
            
            $.get('http://localhost/test-laravel-admin/public/api/users', function(data, status) {
                data.forEach(element => {
                    const handleType = () => {
                    switch (element.status) {
                        case '1':
                            return '<p>Chờ Xác Thực</p>'
                            break;
                        case '2':
                        return '<p>Phê Duyệt</p>'
                        break;
                        case '3':
                        return  '<p>Ngừng Hoạt Động</p>'
                            break;
                        case '4':
                        return'<p>Rút Khỏi Đội</p>'
                        break;
                        default:
                            break;
                    }}
                    const handleGrengder = () =>{
                        switch (element.grender) {
                            case '0':
                            return'<p>Nam</p>'
                                break;
                            case '1':
                            return'<p>Nu</p>'
                                break;
                            default:
                                break;
                        }
                    }
                    return  $('tbody').append(`
                        <tr>
                            <th scope="row">${element.id}</th>
                            <td>${element.name}</td>
                            <td>${element.phone}</td>
                            <td>${handleGrengder()}</td>
                            <td>${element.type}</td>
                            <td>${element.created_at}</td>
                            <td>${handleType()}</td>
                        </tr>
                    `)}
                    );
            })

            $('.btn').click(() => {
                $.ajax({
                    type: 'GET',
                    // url: route('search.name', $('#search').val()),
                    url: `http://localhost/test-laravel-admin/public/api/search/${ $('#search').val()}`
                })
                .done(function(data){
                    console.log(data);
                    $('tbody').replaceWith(function ()  {
                         data.forEach(element => {
                            return   $('tbody').append(`
                        <tr>
                            <th scope="row">${element.id}</th>
                            <td>${element.name}</td>
                            <td>${element.phone}</td>
                            <td></td>
                            <td>${element.type}</td>
                            <td>${element.created_at}</td>
                            <td></td>
                        </tr>
                    `)
                        })
                    }
                        
                    )
                })
            
            });
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>