import { useAuth0 } from '@auth0/auth0-react';

const User = () => {
    const { user, isAuthenticated } = useAuth0();
    var username = "NONE";
    if (isAuthenticated) {
        username = user.sub;
    }
    return username;
  };

  export default User;