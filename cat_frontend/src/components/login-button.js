import { GeneralButton } from './Buttons';
import React from 'react';
import { useAuth0 } from '@auth0/auth0-react';

const LoginButton = () => {
  const { loginWithRedirect } = useAuth0();
  return (
    <GeneralButton
      onClick={() => loginWithRedirect()}
    >
      Log In
    </GeneralButton>
  );
};

export default LoginButton;