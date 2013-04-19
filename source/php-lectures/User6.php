<?php
class User
{
    public function save(array $userData)
    {
        try {
            if (!$this->isAdmin()) {
                throw new PermissionDeniedException();
            }
            //code
            $this->isValidData($userData);
            //code

            //code

            //save
        } catch (DoctrineORMException $e) {
            throw new UnableToSaveException();
        } catch (PermissionDeniedException $e) {
            throw new UnableToSaveException();
        } catch (ValidationException $e) {
            throw new UnableToSaveException();
        }
        
        //save

        return true;
    }

    private function isValidData(array $userData)
    {
        //code
        if ($userData['username'] == '') {
            throw new InvalidSomethingException("inalid username");
        }
        if ($userData['password'] == '') {
            throw new InvalidSomethingException("invalid password");
        }
        if (strlen($userData['password']) < 6) {
            throw new ShortSomethingException('Short password');
        }

        return true;
    }

    private function isAdmin()
    {
        return isset($_SESSION['admin']) ? true : false;
    }
}