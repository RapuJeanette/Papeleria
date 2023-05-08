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
            <?php echo e(__('Lista de Users')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <form>
        <link href="<?php echo e(asset('css/search.css')); ?>" rel="stylesheet">
        <input type="text" name="q" placeholder="Buscar..." value="<?php echo e($query ?? ''); ?>">
        <button type="submit">Buscar</button>
    </form>

    <div>
        <a href="<?php echo e(route('admin.users.crear')); ?>"
        class="px-4 py-2 ml-4 font-bold text-white uppercase bg-blue-500 rounded-lg">
        Registrar User
    </a>
    </div>
    <br>
    <div class="py-2">
        <div class="sm:px-6 lg:px-10">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <link href="<?php echo e(asset('css/table.css')); ?>" rel="stylesheet">
                <table>
                    <thead>
                        <tr>
                            <th class="bg-primay">Nombre</th>
                            <th class="bg-primay">Correo</th>
                            <th class="bg-primay">Rol</th>
                            <th class="bg-primay">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-transparent">
                                <td data-label="Nombre"><?php echo e($user->name); ?></td>
                                <td data-label="Email"><?php echo e($user->email); ?></td>
                                <td>
                                    <?php if(!empty($user->getRoleNames())): ?>
                                    <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rolNombre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h5><span class="badge badge-dark"><?php echo e($rolNombre); ?></span></h5>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </td>
                                <td data-label="Acciones">
                                    <DIV class="center">
                                        <a href="<?php echo e(route('admin.users.editar', $user->id)); ?>"
                                            class="px-3 py-2 text-white bg-green-500 rounded-lg">
                                            <button class="btn-editar"><i class="fas fa-pencil-alt"></i></button>
                                        </a>
                                        <form action="<?php echo e(route('admin.users.eliminar', $user)); ?>" method="POST"
                                            onsubmit="return confirm('¿Estas seguro de eliminar el producto: <?php echo e($user->name); ?>?')">
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
                <?php echo e($users->links()); ?>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\papeleria\resources\views/admin/users/index.blade.php ENDPATH**/ ?>