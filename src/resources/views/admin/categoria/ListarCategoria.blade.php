<main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Categorias</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dash')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categoria</li>
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
                        <h3 class="card-title">Categoria Cadastradas</h3>
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
                              placeholder="Pesquisar Categoria"
                              aria-label="Pesquisar Categoria"
                              style="width: 180px"
                            />
                          </div>
                          <select
                            id="user-role-filter"
                            class="form-select form-select-sm w-auto"
                            aria-label="Filter by role"
                          >
                            <option value="all" selected>Todos</option>
                            <option value="administrator">Ativos</option>
                            <option value="editor">Inativos</option>
                            
                          </select>

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
                            <th>Nome</th>
                            <th>Status</th>                        
                            <th class="text-end">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($listaCategoria as $lista)
                          <tr>
                            {{-- ID --}}
                            <td>
                              {{$lista->id_categoria}}
                            </td>                    

                            {{-- NOME --}}
                            <td>
                              @if($lista->nome_categoria)
                                 <span class="badge text-bg-sucess"> {{$lista->nome_categoria}}</span>
                                  
                              @else
                                <span class="text-muted">
                                  Sem Categoria
                                </span> 
                              @endif
                            </td>

                            <td>
                              @if($lista->status_categoria === 'ATIVO')
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
                                  data-id="{{ $lista->id_categoria}}"  
                                  data-nome="{{ $lista->nome_categoria }}"  
                                  data-status="{{ $lista->status_categoria}}"  
                                  data-url="{{ route('admin.categoria.status', $lista->id_categoria)}}"  
                                  aria-label="Editar - {{$lista->id_categoria}}"
                                  submit="{{$lista->id_categoria}}"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                         

                                <form action="{{ route('admin.categoria.status', $lista->id_categoria)}}"
                                method="POST"
                                 class="d-inline"                                                           
                                >
                                  @csrf
                                  @method('PATCH')

                                  @if( $lista->status_categoria === 'ATIVO')
                                    <button
                                      type="submit"
                                      class="btn btn-outline-danger"
                                      data-bs-toggle="modal"
                                      data-bs-target="#modal-status-categoria"
                                      tytle="Desativar categoria"
                                      data-nome="{{ $lista->nome_categoria }}"  
                                      data-status="ATIVO"  
                                      data-url="{{ route('admin.categoria.status', $lista->id_categoria)}}"  
                                      aria-label="Deletar">                                    
                                      <i class="bi bi-eye-fill" aria-hidden="true"></i>
                                    </button>
                                  @else
                                    <button
                                      type="submit"
                                      class="btn btn-outline-success"
                                      data-bs-toggle="modal"
                                      data-bs-target="#modal-status-categoria"
                                      tytle="Desativar categoria"
                                      data-nome="{{ $lista->nome_categoria }}"  
                                      data-status="INATIVO"  
                                      data-url="{{ route('admin.categoria.status', $lista->id_categoria)}}"  
                                      aria-label="Deletar">                                    
                                       <i class="bi bi-eye-slash-fill" aria-hidden="true"> </i>
                                    </button>
                                  @endif

                                </form>
                              </div>
                            </td>
                          </tr>
                          @empty
                            <tr>
                              <td colspan="5"
                              class="text-center py-4 text-muted"
                              >
                              Nenhuma categoria cadastrada.  
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
                   Total de News Letters:
                   <strong>
                    {{$listaCategoria-> count()}}
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
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- CADASTRO -->
                  <form
                  action="{{ route('admin.categoria.store')}}"
                  method="POST"
                  enctype="multipart/form-data"
                  >
                  @csrf

                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-add-user-label">Cadastrar nova categoria</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="new-user-name" class="form-label"> Nome da categoria </label>
                        <input
                          type="text"
                          class="form-control"
                          id="new-categoria-name"
                          placeholder="CAFÉ"
                          required
                          name="nome_categoria"
                        />
                      </div>


            
                      <div class="mb-3">
                        <label for="new-categoria-role" class="form-label"> Status </label>
                        <select id="new-categoria-role" class="form-select" name="status_categoria">
                          <option value="ATIVO">ATIVO</option>
                          <option value="INATIVO">INATIVO</option>
                    
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
                  <!-- FIM CADASTRO -->
                </div>
              </div>
            </div>
            <!--end::Add User Modal-->

            <!--INÍCIO ATUALIZAR BANNER-->
            <div
              class="modal fade"
              id="modal-edit-user"
              tabindex="-1"
              aria-labelledby="modal-delete-user-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form id="form-edit-categoria"                  
                  method="POST"
                  enctype="multipart/form-data"
                  >
                  @csrf
                  @method('PUT')

                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-add-user-label">Editar categoria</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="edit-categoria-titulo" class="form-label"> Nome da categoria </label>
                        <input
                          type="text"
                          class="form-control"
                          id="edit-categoria-titulo"                          
                          required
                          name="nome_categoria"
                        />
                      </div>

                      <div class="mb-3">
                        <label for="edit-categoria-status" class="form-label"> Status </label>
                        <select id="edit-categoria-status" class="form-select" name="status_categoria">
                          <option value="ATIVO">ATIVO</option>
                          <option value="INATIVO">INATIVO</option>
                    
                        </select>
                      </div>
                  
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </button>
                      <button type="submit" class="btn btn-primary">Editar Categoria</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--FIM ATUALIZAR BANNER-->

            <!-- INÍCIO STATUS CATEGORIA -->
            <div
            class="modal fade"
            id="modal-status-categoria"
            tabindex="-1"
            aria-labelledby="modal-status-categoria-label"
            aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form id="form-status-categoria"
                  method="POST"
                  >
                  @csrf
                  @method('PATCH')

                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-status-categoria-nome">Atualizar categoria</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    
                    <div class="modal-body">
                      <p class="mb-0"
                      id="modal-status-categoria-txt">
                        Você deseja alterar o status da categoria?  Esse conteúdo deixará de aparecer no site.
                      </p>
                    </div>
                           
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </button>
                      <button type="submit" class="btn btn-primary" id="btn-status-categoria">Confirmar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- INÍCIO STATUS CATEGORIA -->

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
     
<script>
    const modalEditarCategoria = document.getElementById('modal-edit-user');
    const formEditCategoria = document.getElementById('form-edit-categoria');
    const editTitulo = document.getElementById('edit-categoria-titulo');
    const editStatus = document.getElementById('edit-categoria-status');

  // CARREGAR AS INFORMAÇÕES  NO MODAL
  modalEditarCategoria.addEventListener('show.bs.modal', function(event){
    const botao = event.relatedTarget;

    const id = botao.getAttribute('data-id');
    const titulo = botao.getAttribute('data-titulo');
    const status = botao.getAttribute('data-status');
    const url = botao.getAttribute('data-url');

    
  //FORM ACTION
    formEditCategoria.action = url;

  //PREENCHER
    editTitulo.value = titulo;
    editStatus.value = status;

  });


</script>


<!-- ATIVAR E DESATIVAR STATUS -->
<script>

  // MAPEA OS CAMPOS DO MODAL
  const modalStatusCategoria = document.getElementById('modal-status-categoria');
  const formStatusCategoria = document.getElementById('form-status-categoria');
  const tituloStatusCategoria = document.getElementById('modal-status-categoria-nome');
  const txtStatusCategoria = document.getElementById('modal-status-categoria-txt');
  const btnStatusCategoria = document.getElementById('btn-status-categoria');

  // QUANDO O MODAL É CARREGADO, ELE DISPARA UM EVENTO COM AS INFORMAÇÕES DO BOTÃO
  modalStatusCategoria.addEventListener('show.bs.modal', function(event){

    const botao = event.relatedTarget;

    const url = botao.getAttribute('data-url');
    const nome = botao.getAttribute('data-nome');
    const status =  botao.getAttribute('data-status');
    
    formStatusCategoria.action = url;

    

    if(status === 'ATIVO'){
      tituloStatusCategoria.textContent = 'Desativar Status categoria';
      txtStatusCategoria.textContent = 'Você deseja desativar o status do categoria? Esse conteúdo deixará de aparecer no site.';
      btnStatusCategoria.textContent = 'Desativar';

      btnStatusCategoria.className = 'btn btn-warning'; 
    }else{
      tituloStatusCategoria.textContent = 'Ativar Status categoria';
      txtStatusCategoria.textContent = 'Você deseja ativar o status do categoria? Esse conteúdo deixará de aparecer no site.';
      btnStatusCategoria.textContent = 'Ativar';

      btnStatusCategoria.className = 'btn btn-success'; 

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