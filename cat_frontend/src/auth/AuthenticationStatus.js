import { useAuth0 } from '@auth0/auth0-react';

const AuthenticationStatus = () => {
    const { isAuthenticated } = useAuth0();
  
    return isAuthenticated ? "authenticated": "not authenticated";
  };

  export default AuthenticationStatus;