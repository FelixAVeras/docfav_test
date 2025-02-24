<?php

class RegisterUserUseCase
{
    private UserRepositoryInterface $userRepository;
    private EventDispatcherInterface $eventDispatcher; // Necesitas implementar esto

    public function __construct(UserRepositoryInterface $userRepository, EventDispatcherInterface $eventDispatcher)
    {
        $this->userRepository = $userRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function execute(RegisterUserRequest $request): void
    {
        // Verificar si el email ya está en uso
        if ($this->emailExists($request->email)) {
            throw new Exception('El email ya está en uso.');
        }

        // Crear el usuario
        $user = User::register(
            $request->id,
            $request->name,
            $request->email,
            $request->password
        );

        // Guardar el usuario
        $this->userRepository->save($user);

        // Disparar el evento
        $this->eventDispatcher->dispatch(new UserRegisteredEvent($user));
    }

    private function emailExists(string $email): bool {
        //Implementación placeholder
        $allUsers = $this->userRepository->findAll(); //Se asume que este método existe
        foreach($allUsers as $user){
            if($user->email()->value() === $email){
                return true;
            }
        }
        return false;
    }
}


?>