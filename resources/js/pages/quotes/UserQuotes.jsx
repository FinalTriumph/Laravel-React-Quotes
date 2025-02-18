import React from 'react';
import QuotesContainer from '../../containers/QuotesContainer.jsx';
import SectionTitle from '../../components/SectionTitle.jsx';

export default function UserQuotes({ page, user }) {
    return (
        <div className="text-left">
            <SectionTitle title={`All saved quotes from user: ${user}`} />
            <QuotesContainer type="user" page={page} user={user} />
        </div>
    );
}
