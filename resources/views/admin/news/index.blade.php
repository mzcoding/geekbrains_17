@extends('layouts.admin')
@section('content')
    <h2>Список новостей</h2>
    <a href="{{ route('admin.news.create') }}" style="float:right;" class="btn btn-primary">Добавить запись</a>

    <br><br>
    <div class="table-responsive">

        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Категория</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->category->title }}</td>
                <td>{{ $news->author }}</td>
                <td>{{ $news->status }}</td>
                <td>{{ $news->created_at->format('d-m-Y H:i') }}</td>
                <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Ред.</a> &nbsp;
                    <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="color: red;">Уд.</a></td>
            </tr>
            @empty
                <tr>
                    <td colspan="6">Записе не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $newsList->links() }}
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                    const id = e.getAttribute('rel');
                    if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                        //send id on the server

                        send(`/admin/news/${id}`).then(() => {
                            location.reload();
                        });
                    }else {
                        alert("Удаление отменено");
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
