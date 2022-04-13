import React, {Component, Fragment} from 'react';
import '../App.css';

class Foot extends Component {
    render() {
        const currentYear = new Date().getFullYear();
        return (
            
            <Fragment>
                <footer>
                    <p className='copyright'>Copyright &copy; {currentYear} Soteria</p>
                </footer>
            </Fragment>
        )
    }
};

export const Footer = () => {
    return (
    <Foot />
    );
  };