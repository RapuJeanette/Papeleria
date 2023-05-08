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
            <?php echo e(__('Usuarios')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <form>
        <link href="<?php echo e(asset('css/search.css')); ?>" rel="stylesheet">
        <input type="text" name="q" placeholder="Buscar...">
        <button type="submit">Buscar</button>

    </form>

    <div class="py-3">
        <div class="flex justify-end mr-10">
            <a href="<?php echo e(route('usuario.crear')); ?>" class="px-3 py-2 text-white bg-blue-500 rounded-lg"
                type="submit">Registrar Usuario
            </a>
        </div>
    </div>

    <div class="py-2">
        <div class="sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <link href="<?php echo e(asset('css/table.css')); ?>" rel="stylesheet">
                <table>
                    <thead>
                        <tr>
                            <th class="bg-primay">Id</th>
                            <th class="bg-primay">Nombre</th>
                            <th class="bg-primay">Correo</th>
                            <th class="bg-primay">Contraseña</th>
                            <th class="bg-primay">Estado</th>
                            <th class="bg-primay">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-transparent">
                                <td data-label="Id"><?php echo e($usuario->id); ?></td>
                                <td data-label="Nombre"><?php echo e($usuario->name); ?></td>
                                <td data-label="Email"><?php echo e($usuario->email); ?></td>
                                <td data-label="Contraseña"><?php echo e($usuario->password); ?></td>
                                <td data-label="Estado"><?php echo e($usuario->estado ? 'Activo' : 'No-Activado'); ?></td>
                                <td data-label="Acciones">
                                    <DIV class="bottom-auto">
                                        <a href="<?php echo e(route('usuario.editar', $categoria->id)); ?>"
                                            class="px-3 py-2 text-white bg-green-500 rounded-lg">
                                            <button class="btn-editar"><i class="fas fa-pencil-alt"></i></button>
                                        </a>

                                        <form action="<?php echo e(route('usuario.eliminar', $categoria)); ?>" method="POST"
                                            onsubmit="return confirm('¿Estas seguro de eliminar el producto: <?php echo e($categoria->name); ?>?')">
                                            <?php echo csrf_field(); ?>
                                            <button class="px-3 py-2 bg-red-500 rounded-lg btn-eliminar"><i
                                                    class="fas fa-trash" style="color:white"></i></button>
                                        </form>
                                    </DIV>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\papeleria\resources\views/usuarios/index.blade.php ENDPATH**/ ?>