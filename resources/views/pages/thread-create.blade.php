<!-- Buat Thread Modal-->
<div class="modal fade" id="threadModal" aria-labelledby="threadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="threadModalLabel">Buat Thread</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('buat-thread') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="title" class="col-form-label">Judul</label>
                        <select class="form-control js-example-tags" id="title" name="title">
                          <option value=""></option>
                          @foreach (\App\Models\Thread::all() as $item)
                          <option>{{ $item->title }}<a href=""><i class="fas fa-caret-right"></i></a></option>
                          @endforeach  
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectCategory">Pilih Kategori</label>
                        <select class="form-control" id="selectCategory" name="category_id">
                            <option value="" selected disabled>--Pilih Kategori--</option>
                            @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="textContent" class="col-form-label">Konten</label>
                        <textarea class="form-control" name="content"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times"></i>
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fab fa-telegram-plane"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
