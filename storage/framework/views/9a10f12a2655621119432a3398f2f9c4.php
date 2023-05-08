<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <?php echo e(__('Productos')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <form>
        <link href="<?php echo e(asset('css/search.css')); ?>" rel="stylesheet">
        <input type="text" name="q" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>

    <div class="py-3">
        <div class="flex justify-end mr-5">
            <a href="<?php echo e(route('producto.crear')); ?>" class="px-3 py-2 text-white bg-blue-500 rounded-lg"
                type="submit">Crear Producto
            </a>
        </div>
    </div>

    <div class="py-2">
        <div class="sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg table-responsive">
                <link href="<?php echo e(asset('css/table.css')); ?>" rel="stylesheet">
                <table>
                    <thead>
                        <tr>
                            <th class="bg-primay">Id</th>
                            <th class="bg-primay">Nombre</th>
                            <th class="bg-primay">Descripcion</th>
                            <th class="bg-primay">Precio</th>
                            <th class="bg-primay">Categoria</th>
                            <th class="bg-primay">Imagen</th>
                            <th class="bg-primay">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-transparent">
                                <td data-label="Id"><?php echo e($producto->id); ?></td>
                                <td data-label="Nombre"><?php echo e($producto->name); ?></td>
                                <td data-label="Descripcion"><?php echo e($producto->description); ?></td>
                                <td data-label="Precio"><?php echo e($producto->precio); ?></td>
                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($categoria->id == $producto->id_categoria): ?>
                                        <td data-label="Categoria"><?php echo e($categoria->name); ?></td>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td data-label="Imagen">
                                    <center>
                                        <img class="w-28 h-28" src="<?php echo e(asset($producto->imagen_url)); ?>" alt="">
                                    </center>
                                </td>
                                <td data-label="Acciones">
                                    <center>
                                        <a href="<?php echo e(route('producto.editar', $producto->id)); ?>"
                                            class="px-3 py-2 mr-1 bg-green-500 rounded-lg text-green-50">
                                            <button class="btn-editar"><i class="fas fa-pencil-alt"></i></button>
                                        </a>
                                        <form action="<?php echo e(route('producto.eliminar', $producto)); ?>" method="POST"
                                            onsubmit="return confirm('¿Estas seguro de eliminar el producto: <?php echo e($producto->name); ?>?')">
                                            <?php echo csrf_field(); ?>
                                            <button class="px-3 py-2 bg-red-500 rounded-lg btn-eliminar"><i
                                                    class="fas fa-trash" style="color:white"></i></button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        <?php if(Session::has('success')): ?>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("<?php echo e(session('success')); ?>")
        <?php endif; ?>
        <?php if(Session::has('eliminado')): ?>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("<?php echo e(session('eliminado')); ?>")
        <?php endif; ?>
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\papeleria\resources\views/productos/index.blade.php ENDPATH**/ ?>