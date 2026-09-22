<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6">
          <h1 class="mb-0 fs-3">Banners</h1>
        </div>
        <div class="col-sm-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-sm-end">
              <li class="breadcrumb-item"><a href="{{ route('dash')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Banner</li>
            </ol>
          </nav>
        </div>
      </div>
      <!--end::Row-->

      @if(session('sucesso'))

      <!-- ALERTAS SUCESSO-->
      <div class="alert alert-success" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('sucesso') }}
      </div>
      @endif

      @if(session('erro'))

      <!-- ALERTAS ERROS-->
      <div class="alert alert-danger" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>
        {{ session('erro') }}
      </div>
      @endif

    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content Header-->
  <!--begin::App Content-->
  <div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-12">
          <!--begin::Card-->
          <div class="card mb-4">
            <!--begin::Card Header-->
            <div class="card-header">
              <div class="row g-2 align-items-center">
                <div class="col-12 col-md-4">
                  <h3 class="card-title">Banners Cadastrados</h3>
                </div>
                <div class="col-12 col-md-8">
                  <div class="d-flex flex-wrap justify-content-md-end gap-2">
                    <div class="input-group input-group-sm w-auto">
                      <span class="input-group-text">
                        <i class="bi bi-search" aria-hidden="true"></i>
                      </span>
                      <input
                        type="search"
                        id="user-search"
                        class="form-control"
                        placeholder="Pesquisar Banner"
                        aria-label="Pesquisar Banner"
                        style="width: 180px" />
                    </div>
                    <select
                      id="user-role-filter"
                      class="form-select form-select-sm w-auto"
                      aria-label="Filter by role">
                      <option value="all" selected>Todos</option>
                      <option value="administrator">Ativos</option>
                      <option value="editor">Inativos</option>

                    </select>
                    <button
                      type="button"
                      class="btn btn-sm btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#modal-add-user">
                      <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                      Novo Banner
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--end::Card Header-->
            <!--begin::Card Body-->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover align-middle m-0">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Imagem</th>
                      <th>Título</th>
                      <th>Status</th>
                      <th class="text-end">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($listaBanner as $lista)
                    <tr>
                      {{-- ID --}}
                      <td>
                        {{$lista->id_banner}}
                      </td>

                      {{-- IMAGEM --}}
                      <td>
                        @if($lista->imagem_banner)
                        <img
                          src="{{ asset('barista/assets/' . $lista->imagem_banner)}}" alt="{{$lista->titulo_banner}}"
                          class="rounded"
                          style="
                                    width: 100px;
                                    height: 75px;
                                    object-fit: cover;
                                 ">

                        @else
                        <span class="text-muted">
                          Sem Imagem
                        </span>
                        @endif
                      </td>

                      {{-- TÍTULO --}}
                      <td>
                        <span class="badge text-bg-sucess"> {{$lista->titulo_banner}}</span>
                      </td>
                      
                      {{-- STATUS --}}
                      <td>
                        @if($lista->status_banner === 'ATIVO')
                        <span class="badge text-bg-success">Ativo</span>
                        @else
                        <span class="badge text-bg-warning">Inativo</span>
                        @endif

                      </td>

                      {{-- AÇÕES --}}
                      <td class="text-end">
                        <div class="btn-group btn-group-sm">
                          <button
                            type="button"
                            class="btn btn-outline-secondary"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-edit-user"
                            data-id="{{ $lista->id_banner }}"
                            data-titulo="{{ $lista->titulo_banner}}"
                            data-status="{{ $lista->status_banner }}"
                            data-image="{{ asset('barista/assets/' . $lista->imagem_banner) }}"
                            data-url=" {{ route('admin.banner.status', $lista->id_banner ) }}"
                            aria-label="Editar - {{$lista->id_banner}}"
                            submit="{{$lista->id_banner}}" ;>

                            <i class="bi bi-pencil" aria-hidden="true"> </i>
                          </button>

                          <!-- INÍCIO - ATIVAR E DESTIVAR -->
                          <form 
                          action="{{ route('admin.banner.status', $lista->id_banner) }}"
                          method='POST' 
                          class="d-inline">
                            @csrf
                            @method('PATCH')
                            
                            @if($lista->status_banner === 'ATIVO')

                              <button
                                type="submit"
                                class="btn btn-outline-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-status-banner"
                                tytle="Desativar Banner"
                                data-url="{{ route('admin.banner.status', $lista->id_banner) }}"
                                data-titulo="{{$lista->titulo_banner}}"
                                data-status="ATIVO"
                                aria-label="Deletar">
                                <i class="bi bi-eye-fill" aria-hidden="true"> </i>
                              </button>

                              @else
                              <button
                                type="submit"
                                class="btn btn-outline-success"
                                data-bs-toggle="modal"
                                data-bs-target="#modal-status-banner"
                                tytle="Desativar Banner"
                                data-url="{{ route('admin.banner.status', $lista->id_banner) }}"
                                data-titulo="{{$lista->titulo_banner}}"
                                data-status="INATIVO"
                                aria-label="Deletar">
                                <i class="bi bi-eye-slash-fill" aria-hidden="true"> </i>
                              </button>
                            
                            @endif
                          </form>

                          <!-- FIM - ATIVAR E DESTIVAR -->
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5"
                        class="text-center py-4 text-muted">
                        Nenhum Banner cadastrado.
                      </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!--end::Card Body-->

            <!--begin::Card Footer-->
            <div class="card-footer clearfix">
              <div class="float-start pt-1 fs-7 text-body-secondary">
                Total de Banners:
                <strong>
                  {{$listaBanner-> count()}}
                </strong>
              </div>
              <ul class="pagination pagination-sm m-0 float-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous"> &laquo; </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">5</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next"> &raquo; </a>
                </li>
              </ul>
            </div>
            <!--end::Card Footer-->
          </div>

          <!--end::Card-->
        </div>
        <!-- /.col -->
      </div>
      <!--end::Row-->



      <!--begin::Add User Modal-->
      <div
        class="modal fade"
        id="modal-add-user"
        tabindex="-1"
        aria-labelledby="modal-add-user-label"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- FORMA DE CADASTRO -->
            <form action="{{ route('admin.banner.store') }}"
              method="POST"
              enctype="multipart/form-data">
              @csrf

              <div class="modal-header">
                <h5 class="modal-title" id="modal-add-user-label">Cadastrar novo Banner</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="mb-3">
                  <label for="new-banner-name" class="form-label"> Título do Banner </label>
                  <input
                    type="text"
                    class="form-control"
                    id="new-banner-name"
                    placeholder="Promoção de Inverno"
                    required
                    name="titulo_banner" />
                </div>
                <div class="mb-3">
                  <label for="img-banner" class="form-label"> Selecione uma Imagem </label>

                  <input type="file" class="form-control input-banner" id="img-banner" accept="image/*" name="imagem_banner" required>

                  <label for="img-banner" class="banner-upload">
                    <img id="ver-banner" src="{{ asset('barista/assets/banner/sem-banner.svg') }}" alt="Selecione uma imagem para o banner">

                    <div class="banner-upload">
                      <i class="bi bi-image"></i>
                      <span>Clique para Selecionar o Banner</span>
                    </div>
                  </label>

                </div>
                <div class="mb-3">
                  <label for="new-banner-role" class="form-label"> Status </label>
                  <select id="new-banner-role" class="form-select" name="status_banner">
                    <option value="ATIVO">Ativo</option>
                    <option value="INATIVO">Inativo</option>
                  </select>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Cancelar
                </button>
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>



          </div>
        </div>
      </div>
      <!--end::Add User Modal-->


      <!-- INÍCIO MODAL EDITAR -->
      <div
        class="modal fade"
        id="modal-edit-user"
        tabindex="-1"
        aria-labelledby="modal-add-user-label"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- FORMA DE  -->
            <form 
              id="form-edit-banner"
              method="POST"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="modal-header">
                <h5 class="modal-title" id="modal-add-user-label">Editar Banner</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="mb-3">
                  <label for="edit-banner-titulo" class="form-label"> Título do Banner </label>
                  <input
                    type="text"
                    class="form-control"
                    id="edit-banner-titulo"
                    required
                    name="titulo_banner" />
                </div>
                <div class="mb-3">
                  <label for="edit-banner-imagem" class="form-label"> Selecione uma Imagem </label>

                  <input type="file" class="form-control input-banner" id="edit-banner-imagem" accept="image/*" name="imagem_banner" >

                  <label for="edit-banner-imagem" class="banner-upload">
                    <img id="edit-banner-mostrar" src="" alt="Banner">

                    <div class="banner-upload">
                      <i class="bi bi-image"></i>
                      <span>Deixe vázio para manter a imagem atual</span>
                    </div>
                  </label>

                </div>
                <div class="mb-3">
                  <label for="edit-banner-status" class="form-label"> Status </label>
                  <select id="edit-banner-status" class="form-select" name="status_banner">
                    <option value="ATIVO">Ativo</option>
                    <option value="INATIVO">Inativo</option>
                  </select>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Cancelar
                </button>
                <button type="submit" class="btn btn-primary" >Atualizar Banner</button>
              </div>
            </form>



          </div>
        </div>
      </div>

      <!-- FIM MODAL EDITAR -->

      <!--INÍCIO::DELETAR Modal-->
      <div
        class="modal fade"
        id="modal-status-banner"
        tabindex="-1"
        aria-labelledby="modal-status-banner-label"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <form id="form-status-banner" 
            method="POST">
            @csrf
            @method('PATCH')

            <div class="modal-header">
              <h5 class="modal-title" id="modal-status-banner-titulo">Alterar status do banner</h5>
              <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <p class="mb-0"
              id="modal-status-banner-txt">
                Você deseja alterar o status do banner?  Esse conteúdo deixará de aparecer no site.
              </p>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" id="btn-status-banner">
                Confirmar
              </button>
            </div>

            </form>

          </div>
        </div>
      </div>
      <!--FIM::DELETAR Modal-->
    </div>
    <!--end::Container-->
  </div>

  <!--end::App Content-->
</main>


<!-- JS do input banner: -->
<script>
  const inputBanner = document.getElementById('img-banner');
  const previewBanner = document.getElementById('ver-banner');

  inputBanner.addEventListener('change', function() {

    const arquivo = this.files[0];

    if (arquivo) {

      previewBanner.src = URL.createObjectURL(arquivo);

    }

  });
</script>


<script>
    const modalEditarBanner = document.getElementById('modal-edit-user');
    const formEditBanner = document.getElementById('form-edit-banner');
    // const editId = document.getElementById('edit-banner-id');
    const editTitulo = document.getElementById('edit-banner-titulo');
    const editStatus = document.getElementById('edit-banner-status');
    const editImagem = document.getElementById('edit-banner-imagem');
    const editMostrar = document.getElementById('edit-banner-mostrar');

  // CARREGAR AS INFORMAÇÕES  NO MODAL
  modalEditarBanner.addEventListener('show.bs.modal', function(event){
    const botao = event.relatedTarget;

    const id = botao.getAttribute('data-id');
    const titulo = botao.getAttribute('data-titulo');
    const status = botao.getAttribute('data-status');
    const image = botao.getAttribute('data-image');
    const url = botao.getAttribute('data-url');

    
  //FORM ACTION
    formEditBanner.action = url;

  //PREENCHER
    editTitulo.value = titulo;
    editStatus.value = status;
    editMostrar.src = image;

    console.log(editMostrar.src);

    //GARANTIR QUE O VALOR DA IMAGEM VENHA VÁZIA
    editImagem.value = '';  

  });

//VER FOTO PARA EDITAR
  editImagem.addEventListener('change', function() {

    const arquivo = this.files[0];

    if (arquivo) {

      editMostrar.src = URL.createObjectURL(arquivo);

    }

  });
</script>

<!-- ATIVAR E DESATIVAR STATUS -->
<script>

  // MAPEA OS CAMPOS DO MODAL
  const modalStatusBanner = document.getElementById('modal-status-banner');
  const formStatusBanner = document.getElementById('form-status-banner');
  const tituloStatusBanner = document.getElementById('modal-status-banner-titulo');
  const txtStatusBanner = document.getElementById('modal-status-banner-txt');
  const btnStatusBanner = document.getElementById('btn-status-banner');

  // QUANDO O MODAL É CARREGADO, ELE DISPARA UM EVENTO COM AS INFORMAÇÕES DO BOTÃO
  modalStatusBanner.addEventListener('show.bs.modal', function(event){

    const botao = event.relatedTarget;

    const url = botao.getAttribute('data-url');
    const titulo = botao.getAttribute('data-titulo');
    const status =  botao.getAttribute('data-status');
    
    formStatusBanner.action = url;

    

    if(status === 'ATIVO'){
      tituloStatusBanner.textContent = 'Desativar Status Banner';
      txtStatusBanner.textContent = 'Você deseja desativar o status do banner? Esse conteúdo deixará de aparecer no site.';
      btnStatusBanner.textContent = 'Desativar';

      btnStatusBanner.className = 'btn btn-warning'; 
    }else{
      tituloStatusBanner.textContent = 'Ativar Status Banner';
      txtStatusBanner.textContent = 'Você deseja ativar o status do banner? Esse conteúdo deixará de aparecer no site.';
      btnStatusBanner.textContent = 'Ativar';

      btnStatusBanner.className = 'btn btn-success'; 

    }

  });
</script>

<!-- TIME PARA O ALERTA -->
<script>
  setTimeout(() => {
    const alertas = document.querySelectorAll('.alert');

    alertas.forEach(function(alerta){
      const instancia = bootstrap.Alert.getOrCreateInstance(alerta);

      instancia.close();
    });
  }, 6000);
</script>