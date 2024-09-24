import React from 'react';

const Welcome: React.FC<WelcomeProps> = () => {
    //--- code here ---- //
    return (
        <div className='flex flex-col h-100dvh'>
            <div className="my-auto">
                Welcome
            </div>
        </div>
    );
}

interface WelcomeProps {

}

export default Welcome
