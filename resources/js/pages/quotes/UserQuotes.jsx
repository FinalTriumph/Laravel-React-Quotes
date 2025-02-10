import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';

export default function UserQuotes({ page, user }) {
    return (
        <div className="text-left">
            <div className="bg-custom-neutral-1 shadow py-4 px-6 mb-4">
                <h1 className="font-bold">Quotes from user: {user}</h1>
            </div>
            <QuotesContainer type="user" page={page} user={user} />
        </div>
    );
}
